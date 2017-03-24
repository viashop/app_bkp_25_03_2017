<?php

namespace App\Repositories\Control\User\Admin;

use App\Contracts\Repositories\Control\User\Admin\UserAdminRepositoryInterface;
use App\Events\Emails\EventNotifyNewUserAdminRegistered;
use App\Events\Logs\User\EventActivityRecordUserTypeAdded;
use App\Events\Logs\User\EventActivityRecordUserTypeChangead;
use App\Http\Requests\Control\User\UserRegisterRequest;
use App\Http\Requests\Control\User\UserUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use stdClass;

/**
 * Class UserAdminRepository
 * @package App\Repositories\Control\User\Admin
 */
class UserAdminRepository implements UserAdminRepositoryInterface
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
     * UserCreateRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get User
     * @param $id
     * @return mixed
     */
    public function getUser($id=null)
    {
        return $this->user->with('roles')
            ->where('id', $id)
            ->where('admin', true)
            ->first();

    }

    /**
     * Create data User
     * @param UserRegisterRequest $request
     * @return bool
     */
    public function createPost(UserRegisterRequest $request)
    {

        DB::beginTransaction();

        try {

            if ($this->user->where('email', $request->email)->count() <= 0) {

                $roles = $request->role_id;
                $password = str_random(10);

                $user = $this->user->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($password),
                    'admin' => true,
                    'active' => true,
                ]);

                foreach ($roles as $role) {
                    $user->roles()->attach($role);
                }

                $stdClass = new stdClass();
                $stdClass->new = $user;
                $stdClass->password = $password;

                event(new EventActivityRecordUserTypeAdded($stdClass));
                event(new EventNotifyNewUserAdminRegistered($stdClass));

                DB::commit();

                return true;

            }

        } catch (Exception $e) {

            DB::rollBack();

        }

    }


    /**
     * Update data User
     * @param UserUpdateRequest $request
     * @return bool
     */
    public function updatePost(UserUpdateRequest $request)
    {

        DB::beginTransaction();

        try {

            if ($this->user->where('id', $request->route('id'))->count() > 0) {

                $user = $this->user->findOrFail($request->route('id'));
                $stdClass = new stdClass();
                $stdClass->old = $user;

                $roles = $request->input('role_id');

                $this->user->where('id', $request->route('id'))
                    ->update([
                        'name' => $request->input('name'),
                        'email' => $request->input('email')
                    ]);

                $user->roles()->sync($roles);

                $stdClass->new = $this->user->findOrFail($request->route('id'));
                event(new EventActivityRecordUserTypeChangead($stdClass));

                //Verify if trashed and delete
                if ($this->trashed === true) {
                    $this->user->destroy($request->route('id'));
                }

                DB::commit();
                return true;

            }

        } catch (QueryException $e) {

            DB::rollBack();

        }

    }

    /**
     * Update data User Trashed
     * @param UserUpdateRequest $request
     */
    public function updatePostTrashed(UserUpdateRequest $request)
    {

        $task = $this->user->withTrashed()->findOrFail($request->route('id'));
        if ($task->trashed()) {
            $task->restore();
            $this->trashed = true;
            self::updatePost($request);
        }

    }

}
