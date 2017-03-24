<?php

namespace App\Http\Controllers\Control\Authorization;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use App\Authorizations\Gate\CheckGate;

/**
 * Class AuthorizationPermissionRoleController
 * @package App\Http\Controllers\Control\Authorization
 */
class AuthorizationPermissionRoleController extends Controller
{

    use CheckGate;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Role
     */
    protected $role;

    /**
     * @var Permission
     */
    protected $permission;

    /**
     * AuthorizationPermissionRoleController constructor.
     * @param User $user
     * @param Role $role
     * @param Permission $permission
     */
    public function __construct(User $user, Role $role, Permission $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function readPermission($id)
    {

        $this->checkPermission('read_staff_auditor');

        SEOMeta::setTitle('Permissões');

        $role = $this->role->findOrFail($id);
        $permissions = $this->permission->pluck('description', 'id');

        return view('control.authorization.authorize-permissions-role', compact('role', 'permissions'));

    }

    /**
     * Remove Permissions
     * @param $role_id
     * @param $permission_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function revoke($role_id, $permission_id)
    {

        $this->checkPermission('delete_administrator');

        try {

            $role = $this->role->findOrFail($role_id);

            if ( $role->permissions()->detach($permission_id) ) {
                return redirect()->back()->with('info', \Config('constants.MSG_DATA_PERMISSION_REVOKE_SUCCESS'));
            }

            throw new \Exception();

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }


    /**
     * Authorize Permissions
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authorizePermission(Request $request)
    {

        $this->checkPermission('add_administrator');

        try {

            $role = $this->role->findOrFail($request->route('id'));

            $array_ids = [];
            foreach ($role->permissions as $item) {
                array_push($array_ids, $item->id);
            }

            array_push($array_ids, intval($request->permission_id));

            if ( $role->permissions()->sync($array_ids) ) {
                return redirect()->back()->with('success', \Config('constants.MSG_DATA_PERMISSION_ACTIVE_SUCCESS'));
            }

            throw new \Exception();

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }

    /**
    * Remove Permissões
    * @param $id
    * @return \Illuminate\Http\RedirectResponse
    */
   public function remove($id)
   {

       $this->checkPermission('delete_administrator');

       try {

           if ($id <= 6) {
               throw new \Exception(\Config('constants.MSG_NOT_AUTHORIZED'));
           }

           $role = (array)$this->role->where('name', 'shop_customer')->first()->id;

           $this->user->where('id', $id)->update([
               'admin' => false,
               'user' => true
           ]);

           $make = $this->user->findOrFail($id);
           $make->roles()->sync($role);
           return redirect()->route('control.users.admin.read')->with('success', \Config('constants.MSG_PERMISSIONS_UPDATE_SUCCESS'));

       } catch (\Exception $e) {
           return redirect()->back()->with('danger', $e->getMessage());
       }

   }

}
