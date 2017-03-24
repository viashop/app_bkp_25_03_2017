<?php

namespace App\Http\Controllers\Control\Authorization\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Control\Authorization\RoleRequest;
use App\Models\Role;
use App\Authorizations\Gate\CheckGate;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    use CheckGate;

    /**
     * @var Role
     */
    protected $role;

    /**
     * RoleCreateController constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->checkPermission('add_administrator');
        SEOMeta::setTitle('Criar Funções');
        return view('control.authorization.role.create');
    }

    private function existsRole(RoleRequest $request)
    {
        return $this->role->where(function ($query) use ($request) {
                $query->where('name', str_slug($request->input('name')))
                      ->orWhere('description', $request->input('description'));
            })->count();
    }

    /**
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPost(RoleRequest $request)
    {

        $this->checkPermission('add_administrator');

        try {

            if ($this->existsRole($request) > 0) {
                return redirect()->route('control.authorization.role.read')->with('danger', \Config('constants.MSG_DATA_EQUALS_REGISTERED'));
            }

            $this->role->create([
                    'name' => str_slug( $request->input('name'), '_' ),
                    'description' => $request->input('description')
                ]);

            return redirect()->route('control.authorization.role.read.search', $request->input('description'))->with('success', \Config('constants.MSG_DATA_REGISTERED_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('control.authorization.role.read')->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read(Request $request)
    {

        $this->checkPermission('read_staff_auditor');
        SEOMeta::setTitle('Funções');

        $search = tools_sanitize_search($request->get('search'));

        if (!empty($search)) {
            $roles = $this->role->where('description', 'like', "%$search%")->paginate(50);
        } else {
            $roles = $this->role->paginate(50);
        }

        return view('control.authorization.role.read', compact('roles', 'search'));

    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        $this->checkPermission('edit_administrator');
        SEOMeta::setTitle('Editar Função');
        $role = $this->role->findOrFail($id);
        return view('control.authorization.role.update', compact('role'));
    }

    /**
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePost(RoleRequest $request)
    {

        $this->checkPermission('edit_administrator');

        try {

            if ($this->role->where('id', $request->input('role_id'))->count() <= 0) {
                throw new \Exception();
            }

            $this->role->where('id', $request->input('role_id'))
                ->update([
                    'name' => str_slug( $request->input('name'), '_' ),
                    'description' => $request->input('description')
                ]);

            return redirect()->route('control.authorization.role.read')->with('success', \Config('constants.MSG_USER_UPDATE_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('control.authorization.role.read')->with('danger', \Config('constants.ERROR_PROCESS'));
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

            if ($id <= 11) {
                return redirect()->back()->with('danger', \Config('constants.MSG_NOT_AUTHORIZED'));
            }

            if ($this->role->where('id', $id)->where('default', '!=', 1)->count() > 0) {
                $this->role->destroy($id);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', \Config('constants.ERROR_PROCESS'));
        }

        return redirect()->back()->with('success', \Config('constants.MSG_DATA_REMOVED_SUCCESS'));

    }

}
