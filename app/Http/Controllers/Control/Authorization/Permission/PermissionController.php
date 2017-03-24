<?php

namespace App\Http\Controllers\Control\Authorization\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Control\Authorization\PermissonRequest;
use App\Models\Permission;
use App\Authorizations\Gate\CheckGate;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;


class PermissionController extends Controller
{

    use CheckGate;

    /**
     * @var Permission
     */
    protected $permission;

    /**
     * PermissionCreateController constructor.
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->checkPermission('add_administrator');
        SEOMeta::setTitle('Criar nova permissão');
        return view('control.authorization.permission.create');
    }

    private function existsPermission(PermissonRequest $request)
    {
        return $this->permission->where(function ($query) use ($request) {
                $query->where('name', str_slug($request->input('name')))
                      ->orWhere('description', $request->input('description'));
            })->count();

    }

    /**
     * @param PermissonRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function createPost(PermissonRequest $request)
     {

         $this->checkPermission('add_administrator');

         try {

             if ($this->existsPermission($request) > 0) {
                 return redirect()->route('control.authorization.permission.read')->with('danger', \Config('constants.MSG_DATA_EQUALS_REGISTERED'));
             }

             $this->permission->create([
                     'name' => str_slug( $request->input('name'), '_' ),
                     'description' => $request->input('description')
                 ]);

             return redirect()->route('control.authorization.permission.read.search', $request->input('description'))->with('success', \Config('constants.MSG_DATA_REGISTERED_SUCCESS'));

         } catch (\Exception $e) {
             return redirect()->route('control.authorization.permission.read')->with('danger', \Config('constants.ERROR_PROCESS'));
         }

     }

     /**
      * @param Request $request
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      */
     public function read(Request $request)
     {

         $this->checkPermission('read_staff_auditor');
         SEOMeta::setTitle('Permissões');

         $search = tools_sanitize_search($request->get('search'));

         if (!empty($search)) {
             $permissions = $this->permission->where('description', 'like', "%$search%")->paginate(50);
         } else {
             $permissions = $this->permission->paginate(50);
         }

         return view('control.authorization.permission.read', compact('permissions', 'search'));

     }

     /**
      * @param $id
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      */
     public function update($id)
     {

         $this->checkPermission('edit_administrator');
         SEOMeta::setTitle('Editar Permissão');
         $permission = $this->permission->findOrFail($id);
         return view('control.authorization.permission.update', compact('permission'));

     }

     /**
      * @param PermissonRequest $request
      * @return \Illuminate\Http\RedirectResponse
      */
     public function updatePost(PermissonRequest $request)
     {

         $this->checkPermission('edit_administrator');

         try {

             if ($this->permission->where('id', $request->input('permission_id'))->count() <= 0) {
                 throw new \Exception();
             }

             $this->permission->where('id', $request->input('permission_id'))
                 ->update([
                     'name' => str_slug( $request->input('name'), '_' ),
                     'description' => $request->input('description')
                 ]);

             return redirect()->route('control.authorization.permission.read')->with('success', \Config('constants.MSG_USER_UPDATE_SUCCESS'));

         } catch (\Exception $e) {
             return redirect()->route('control.authorization.permission.read')->with('danger', \Config('constants.ERROR_PROCESS'));
         }

     }

     /**
      * @param $id
      * @return \Illuminate\Http\RedirectResponse
      */
     public function delete($id)
     {

         $this->checkPermission('delete_administrator');

         try {

             if ($this->permission->where('id', $id)->where('default', '!=', 1)->count() > 0) {
                 $this->permission->destroy($id);
                 return redirect()->back()->with('success', \Config('constants.MSG_DATA_REMOVED_SUCCESS'));
             }

             return redirect()->back()->with('danger', \Config('constants.MSG_NOT_AUTHORIZED'));

         } catch (\Exception $e) {
             return redirect()->back()->with('danger', \Config('constants.ERROR_PROCESS'));
         }

     }

}
