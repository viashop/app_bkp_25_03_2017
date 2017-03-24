<?php

namespace App\Http\Controllers\Control\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Control\Personal\PersonalRequest;
use App\Repositories\Control\User\Admin\UserAdminRepository;
use App\Traits\Filters\ValidatePassword;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Auth;
use Respect\Validation\Validator as v;
use App\Models\Role;
use App\Models\User;

class PersonalController extends Controller
{

    use ValidatePassword;

    protected $user;

    /**
     * @var UserAdminRepository
     */
    private $repository;

    private $role;

    public function __construct(User $user, Role $role, UserAdminRepository $repository)
    {
        $this->user = $user;
        $this->role = $role;
        $this->repository = $repository;
    }

    public function read()
    {


        SEOMeta::setTitle('Editar dados pessoais');

        $id = Auth::user()->id;
        $user = $this->repository->getUser($id);
        $roles = $this->role->all();

        $roles_allowed = [];
        foreach ($user->roles as $iten) {
            array_push($roles_allowed, $iten->pivot->role_id);
        }

        return view('control.account.personal',compact('user', 'roles', 'roles_allowed'));

    }

    public function updatePost(PersonalRequest $request)
    {

        try {

            $id = Auth::user()->id;

            if (!empty($request->input('password'))) {

                $this->isPasswordValid($request->input('password'));

                if (!v::equals($request->input('password'))->validate($request->input('password_confirmation'))) {
                    throw new \Exception(\Config('constants.MSG_PASSWORD_IS_NOT_IDENTICAL'));
                }

                $userdata = array(
                    'email'     => Auth::user()->email,
                    'password'  => $request->input('password_current')
                );

                if (!Auth::attempt($userdata)) {
                    throw new \Exception(\Config('constants.MSG_PASSWORD_CURRENT_NOT_EQUALS'));
                }

                $this->user->where('id', $id)->update([
                    'name' => $request->input('name'),
                    'password' => bcrypt($request->input('password')),
                ]);

                return redirect()->back()->with('success', \Config('constants.MSG_DATA_UPDATE_SUCCESS'));

            }

            $this->user->where('id', $id)->update(['name' => $request->input('name')]);

            return redirect()->back()->with('success', \Config('constants.MSG_DATA_UPDATE_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

    }

}
