<?php

namespace App\Repositories\Account;

use App\Contracts\Repositories\Account\UserRepositoryInterface;
use App\Events\Emails\EventNotifyNewUserRegistered;
use App\Events\Logs\User\EventActivityRecordUserLogged;
use App\Events\Logs\User\EventActivityRecordUserLoginInvalid;
use App\Events\Logs\User\EventActivityRecordUserLoginPasswordInvalid;
use App\Events\Logs\User\EventActivityRecordUserRegistered;
use App\Http\Requests\Account\LoginRequest;
use App\Http\Requests\Account\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\Filters\ValidatePassword;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use stdClass;

/**
 * Class UserRepository
 * @package App\Repositories\Account
 */
class UserRepository implements UserRepositoryInterface
{

    use ValidatePassword;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Role
     */
    private $role;

    /**
     * UserRepository constructor.
     * @param User $user
     * @param Role $role
     */
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Exist Email User
     * @param $value
     * @return mixed
     */
    public function existsEmail($value)
    {
        return $this->user->where('email', $value)->exists();
    }


    /**
     * Authenticate User
     *
     * @param LoginRequest $request
     * @return mixed
     * @throws Exception
     */
    public function autheticateUser(LoginRequest $request)
    {

        $stdClass = new stdClass();

        if ($this->existsEmail($request->email)) {

            $data = $this->user->where('email', '=', $request->email)->first();
            $stdClass->new = $data;

            if (Hash::check($request->input('password'), $data->password))
            {
                event( new EventActivityRecordUserLogged( $stdClass ) );
                return $data;
            }

            event(new EventActivityRecordUserLoginPasswordInvalid( $stdClass ) );

            throw new Exception( Config::get('constants.INVALID_EMAIL_OR_PASSWORD') );

        }

        $stdClass->new = ['email' => $request->email];

        event( new EventActivityRecordUserLoginInvalid( $stdClass ) );

        throw new Exception( Config::get('constants.INVALID_EMAIL_OR_PASSWORD') );

    }

    /**
     * Register User
     *
     * @param RegisterRequest $request
     * @return mixed
     * @throws Exception
     */
    public function registerUser(RegisterRequest $request)
    {

        $this->isPasswordValid($request->password);

        if (!$this->existsEmail($request->email)) {

            $role = $this->role->where('name','shop_admin')->first();

            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'verification_token' => sha1( uniqid( microtime() ) ),
                'password' => bcrypt( $request->password )
            ]);

            $user->roles()->attach($role);

            $data = $this->user->findOrFail($user->id);
            $stdClass = new stdClass();
            $stdClass->new = $data;

            event( new EventActivityRecordUserRegistered( $stdClass ) );
            event( new EventNotifyNewUserRegistered( $stdClass ) );

            return $data;

        }

        throw new Exception( Config::get('constants.INVALID_EMAIL_OR_PASSWORD') );

    }

}
