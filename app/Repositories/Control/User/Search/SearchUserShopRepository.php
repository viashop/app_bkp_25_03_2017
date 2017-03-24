<?php

namespace App\Repositories\Control\User\Search;

use App\Contracts\Repositories\Control\User\Search\SearchUserShopRepositoryInterface;
use App\Models\User;

class SearchUserShopRepository implements SearchUserShopRepositoryInterface
{

    /**
     * @var int
     */
    public $perPage = 50;

    /**
     * @var User
     */
    private $user;

    /**
     * UserShopRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Search User
     *
     * @param $search
     * @param $type
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($search, $type)
    {

        $search = tools_sanitize_search($search);
        $query = $this->user->with('roles')->where('admin', false)
            ->whereHas('roles', function ($q) use ($type) {
                $q->where('roles.name', $type);
            });

        if (strlen($search) > 5) {
            $query->whereRaw('match (name, email) against (? in boolean mode)', [$search]);
        } else {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")->where('admin', false);
        }

        return $query->paginate($this->perPage);

    }

}
