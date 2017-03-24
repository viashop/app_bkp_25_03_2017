<?php

namespace App\Http\Controllers\Control\Password;

use App\Events\Emails\EventNotifyNewPasswordGenerateUser;
use App\Events\Logs\User\EventActivityRecordUserGenerateNewPassword;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Authorizations\Gate\CheckGate;
use stdClass;

/**
 * Class GeneratePasswordController
 * @package App\Http\Controllers\Control\Password
 */
class GeneratePasswordController extends Controller
{

    use CheckGate;

    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
    * @param $id
    * @return \Illuminate\Http\RedirectResponse
    */
    public function passwordUserAdmin($id)
    {

        $this->checkPermission('edit_administrator');

        try {

            $this->generateNewPassword($id);
            return redirect()->back()->with('success', \Config('constants.MSG_USER_NEW_PASSWORD_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }


    /**
    * @param $id
    * @return \Illuminate\Http\RedirectResponse
    */
    public function passwordUserShopAdmin($id)
    {

        try {

            $this->generateNewPassword($id);
            return redirect()->route('control.users.shops.admin.read')->with('success', \Config('constants.MSG_USER_NEW_PASSWORD_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('control.users.shops.admin.read')->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }

    /**
    * @param $id
    * @return \Illuminate\Http\RedirectResponse
    */
    public function passwordUserShopEditor($id)
    {

        try {

            $this->generateNewPassword($id);
            return redirect()->route('control.users.shops.editor.read')->with('success', \Config('constants.MSG_USER_NEW_PASSWORD_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('control.users.shops.editor.read')->with('danger', \Config('constants.ERROR_PROCESS'));
        }

    }

    /**
     * Update Password
     * @param $id
     * @return mixed
     */
    private function generateNewPassword($id)
    {

        $password = str_random(10);

        $stdClass = new stdClass();
        $stdClass->new = $this->user->findOrFail($id);
        $stdClass->password = $password;

        $result = $this->user->where('id', $id)
            ->update([
                'password' => bcrypt( $password )
            ]);

        event(new EventActivityRecordUserGenerateNewPassword($stdClass));
        event(new EventNotifyNewPasswordGenerateUser($stdClass));

        return $result;

    }

}
