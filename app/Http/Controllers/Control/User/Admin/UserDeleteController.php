<?php

namespace App\Http\Controllers\Control\User\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Control\User\Admin\UserAdminRepository;
use App\Authorizations\Gate\CheckGate;
use App\Models\User;
use Exception;

/**
 * Class UserDeleteController
 * @package App\Http\Controllers\Control\User
 */
class UserDeleteController extends Controller
{

    use CheckGate;

    /**
     * @var User
     */
    private $user;
    /**
     * @var UserAdminRepository
     */
    private $repository;

    /**
     * UserDeleteController constructor.
     * @param UserAdminRepository $repository
     */
    public function __construct(User $user, UserAdminRepository $repository)
    {

        $this->user = $user;
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {

        $this->checkPermission('delete_administrator');

        try {

            if ($id <= 6) {
                throw new Exception();
            }

            $this->user->destroy($id);

            return redirect()->back()->with('success', \Config('constants.MSG_USER_REMOVE_SUCCESS'));

        } catch (Exception $e) {
            return redirect()->back()->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteTrashed($id)
    {

        $this->checkPermission('delete_administrator');

        try {

            $task = $this->user->withTrashed()->findOrFail($id);
            if (!$task->trashed()) {
                $task->delete();
            } else {
                $task->forceDelete();
            }

            return redirect()->route('control.users.admin.read.trashed')->with('success', \Config('constants.MSG_USER_REMOVE_SUCCESS'));

        } catch (Exception $e) {

            return redirect()->route('control.users.admin.read.trashed')->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }

}
