<?php


namespace App\Repositories\Control\User\Shop;


use App\Contracts\Repositories\Control\User\Shop\UserShopRepositoryInterface;
use App\Events\Logs\User\EventActivityRecordUserTypeChangead;
use App\Http\Requests\Control\User\ShopUserRequest;
use App\Models\User;
use stdClass;

/**
 * Class UserShopRepository
 * @package App\Repositories\Control\User\Shop
 */
class UserShopRepository implements UserShopRepositoryInterface
{

    /**
     * @var int
     */
    protected $perPage = 50;

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
     * @param $value
     * @return mixed
     */
    public function getUser($value)
    {
        return $this->user->where('id', $value)->where('admin', false)
            ->first();

    }

    /**
     * @param ShopUserRequest $request
     * @return bool
     */
    public function updatePost(ShopUserRequest $request)
    {

        if ($this->user->where('id', $request->route('id'))->count() > 0) {

            $stdClass = new stdClass();
            $stdClass->old = $this->user->findOrFail($request->route('id'));

            $this->user->where('id', $request->route('id'))
                ->where('admin', false)
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email')
                ]);

            $stdClass->new = $this->user->findOrFail($request->route('id'));
            event(new EventActivityRecordUserTypeChangead($stdClass));

            return true;

        }

        return false;

    }


    /**
     * List All
     * @param $type
     * @param null $order
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll($type, $order = null)
    {

        $query = $this->user->with('roles')->where('admin', false)
            ->whereHas('roles', function ($q) use ($type) {
                $q->where('roles.name', $type);
            });

        $order = ( isset($order) ) ? $order : 'id';

        return $query->orderBy($order, 'desc')->paginate($this->perPage);

    }

}
