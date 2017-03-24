<?php

namespace App\Http\Controllers\Control\User\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Control\User\ShopUserRequest;
use App\Repositories\Control\User\Shop\UserShopRepository;
use App\Models\Role;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Authorizations\Gate\CheckGate;

/**
 * Class UserUpdateController
 * @package App\Http\Controllers\Control\User\Shop
 */
class UserUpdateController extends Controller
{

    use CheckGate;

    /**
     * @var UserShopRepository
     */
    private $repository;


    private $role;

    /**
     * UserUpdateController constructor.
     * @param UserShopRepository $repository
     */
    public function __construct(Role $role, UserShopRepository $repository)
    {
        $this->repository = $repository;
        $this->role = $role;
    }

    /**
     * @param $id
     * @return $this
     */
    public function updateAdmin($id)
    {

        $this->checkPermission('edit_staff_support');

        SEOMeta::setTitle('Editando Usuários Adminstrativos');

        $type = 'admin';
        $user = $this->repository->getUser($id);

        $roles = $this->role->where('name', '=', 'shop_admin')->get();

        $roles_allowed = [];
        foreach ($user->roles as $iten) {
            array_push($roles_allowed, $iten->pivot->role_id);
        }

        return view('control.users.shops.update',compact('user', 'roles', 'type', 'roles_allowed'));
    }

    /**
     * @param $id
     * @return $this
     */
    public function updateEditor($id)
    {

        $this->checkPermission('edit_staff_support');

        SEOMeta::setTitle('Editando Usuários Editores');

        $user = $this->repository->getUser($id);
        $roles = $this->role->where('name', '=', 'shop_editor')->get();

        $roles_allowed = [];
        foreach ($user->roles as $iten) {
            array_push($roles_allowed, $iten->pivot->role_id);
        }

        return view('control.users.shops.update',compact('user', 'roles', 'type', 'roles_allowed'));
    }

    /**
     * @param ShopUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAdminPost(ShopUserRequest $request)
    {

        $this->checkPermission('edit_staff_support');

        try {

            $this->repository->updatePost($request);
            return redirect()->route('control.users.shops.admin.read')->with('success', \Config('constants.MSG_USER_UPDATE_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('control.users.shops.admin.read')->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }

    /**
     * @param ShopUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEditorPost(ShopUserRequest $request)
    {

        $this->checkPermission('edit_staff_support');

        try {

            $this->repository->updatePost($request);
            return redirect()->route('control.users.shops.editor.read')->with('success', \Config('constants.MSG_USER_UPDATE_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('control.users.shops.editor.read')->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }

}
