<?php

namespace App\Repositories\Control\User\Search;

use App\Contracts\Repositories\Control\User\Search\SearchUserAdminRepositoryInterface;
use App\Models\User;

/**
 * Class SearchUserAdminRepository
 * @package App\Repositories\Control\User\Admin
 */
class SearchUserAdminRepository implements SearchUserAdminRepositoryInterface
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
     * @var bool
     */
    private $trashed = false;

    /**
     * SearchUserAdminRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Search User
     * @param $search
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($search)
    {
        return $this->requestSearch($search);
    }

    /**
     * Search User Trashed
     * @param $search
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchTrashed($search)
    {
        $this->trashed = true;
        return $this->requestSearch($search);
    }

    /**
     * @param $search
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function requestSearch($search)
    {

        $search = tools_sanitize_search($search);

        if ($this->trashed === true) {
            $query = $this->user->with('roles')->onlyTrashed()->where('admin', true);
        } else {
            $query = $this->user->with('roles')->where('admin', true);
        }

        if (strlen($search) > 5) {
            $query->whereRaw('match (name, email) against (? in boolean mode)', [$search]);
        } else {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")->where('admin', true);
        }

        return $query->paginate($this->perPage);

    }

}
