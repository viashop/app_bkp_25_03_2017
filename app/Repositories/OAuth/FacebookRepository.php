<?php


namespace App\Repositories\OAuth;

use App\Contracts\Repositories\OAuth\OAuthExistsInterface;
use App\Contracts\Repositories\OAuth\OAuthInterface;
use App\Events\Logs\User\EventActivityRecordUserLogged;
use App\Events\Logs\User\EventActivityRecordUserRegistered;
use App\Models\Role;
use Illuminate\Database\QueryException;
use App\Models\OAuth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use stdClass;

class FacebookRepository implements OAuthInterface, OAuthExistsInterface
{

    /**
     * @var OAuth
     */
    protected $oauth;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Role
     */
    protected $role;


    /**
     * FacebookRepository constructor.
     * @param User $user
     * @param Role $role
     * @param OAuth $oauth
     */
    public function __construct(OAuth $oauth, User $user, Role $role)
    {
        $this->oauth = $oauth;
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Verify exists id facebook registered
     * @param $value
     * @return mixed
     */
    public function existsOAuthID($value)
    {
        return $this->oauth->where('facebook_id', $value)->exists();
    }

    /**
     * Register User
     * @param $data
     * @return bool|mixed
     */
    public function register($data)
    {

        DB::beginTransaction();

        try {

            if ($this->existsOAuthID($data['id']) !== true) {

                $role = $this->role->where('name', '=', 'shop_admin')->first();

                $this->user->name = isset( $data['name'] ) ? $data['name'] : null;
                $this->user->registered_via_oauth = true;
                $this->user->save();
                $this->user->roles()->attach($role);

                $this->oauth->user_id = $this->user->id;
                $this->oauth->oauth_name = 'facebook';
                $this->oauth->oauth_slug_icon = 'facebook-square';
                $this->oauth->facebook_id = $data['id'];
                $this->oauth->picture = isset( $data['picture']['data']['url'] ) ? $data['picture']['data']['url'] : null;
                $this->oauth->email = isset( $data['email'] ) ? $data['email'] : null;
                $this->oauth->name = isset( $data['name'] ) ? $data['name'] : null;
                $this->oauth->url = isset( $data['link'] ) ? $data['link'] : null;
                $this->oauth->save();
                $this->oauth->users()->attach($this->user->id);

                $user = $this->oauth->with('users')
                    ->where('facebook_id', $data['id'])
                    ->first();


                $stdClass = new stdClass();
                $stdClass->new = $this->user->findOrFail($user->user_id);
                event( new EventActivityRecordUserRegistered($stdClass));
                event( new EventActivityRecordUserLogged($stdClass));

                DB::commit();
                return $user;

            }

            /** Update Register **/
            $up = $this->oauth->where('facebook_id', '=', $data['id'])
                ->update([
                    'picture' => isset( $data['picture']['data']['url'] ) ? $data['picture']['data']['url'] : null,
                    'email' => isset( $data['email'] ) ? $data['email'] : null,
                    'name' => isset( $data['name'] ) ? $data['name'] : null,
                    'url' => isset( $data['link'] ) ? $data['link'] : null
                ]);

            //Array full User Shop
            if ($up) {

                $user = $this->oauth->with('users')
                    ->where('facebook_id', $data['id'])
                    ->first();


                $stdClass = new stdClass();
                $stdClass->new = $this->user->findOrFail($user->user_id);
                event( new EventActivityRecordUserLogged($stdClass));

                DB::commit();
                return $user;

            }

        } catch (QueryException $e) {

            DB::rollBack();

        }

    }

    /**
     * Authenticate User
     * @param $data
     * @return mixed
     */
    public function authenticate($data)
    {

        DB::beginTransaction();

        try {

            if ($this->existsOAuthID($data['id']) === true) {

                $user = $this->oauth->with('users')
                    ->where('facebook_id', $data['id'])
                    ->first();

                /** Update Register **/
                $this->oauth->where('facebook_id', '=', $data['id'])
                    ->update([
                        'picture' => isset( $data['picture']['data']['url'] ) ? $data['picture']['data']['url'] : null,
                        'email' => isset( $data['email'] ) ? $data['email'] : null,
                        'name' => isset( $data['name'] ) ? $data['name'] : null,
                        'url' => isset( $data['link'] ) ? $data['link'] : null
                    ]);

                $stdClass = new stdClass();
                $stdClass->new = $this->user->findOrFail($user->user_id);
                event( new EventActivityRecordUserLogged($stdClass));

                DB::commit();
                return $user;

            }


            DB::commit();

            throw new \Exception(\Config::get('constants.APP_IS_NOT_ASSOCIATED'));

        } catch (QueryException $e) {

            DB::rollBack();

        }

    }

}
