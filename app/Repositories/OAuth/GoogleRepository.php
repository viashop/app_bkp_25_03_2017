<?php


namespace App\Repositories\OAuth;

use App\Contracts\Repositories\OAuth\OAuthExistsInterface;
use App\Contracts\Repositories\OAuth\OAuthInterface;
use App\Events\Logs\User\EventActivityRecordUserLogged;
use App\Events\Logs\User\EventActivityRecordUserRegistered;
use App\Models\OAuth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use stdClass;

class GoogleRepository implements OAuthInterface, OAuthExistsInterface
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
     * GoogleRegisterRepository constructor.
     * @param OAuth $oauth
     * @param User $user
     */
    public function __construct(OAuth $oauth, User $user, Role $role)
    {
        $this->oauth = $oauth;
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Verify exists id google registered
     * @param $value
     * @return mixed
     */
    public function existsOAuthID($value)
    {
        return $this->oauth->where('google_id', $value)->exists();
    }

    /**
     * Register Via OAuth
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function register(array $data)
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
                $this->oauth->oauth_name = 'google';
                $this->oauth->oauth_slug_icon = 'google-plus';
                $this->oauth->google_id = $data['id'];
                $this->oauth->name = isset( $data['name'] ) ? $data['name'] : null;
                $this->oauth->email = isset( $data['email'] ) ? $data['email'] : null;
                $this->oauth->picture = isset( $data['picture'] ) ? $data['picture'] : null;
                $this->oauth->url = isset( $data['link'] ) ? $data['link'] : null;
                $this->oauth->active = isset( $data['active'] ) ? $data['active'] : null;
                $this->oauth->save();
                $this->oauth->users()->attach($this->user->id);

                $user = $this->oauth->with('users')
                    ->where('google_id', $data['id'])
                    ->first();

                $stdClass = new stdClass();
                $stdClass->new = $this->user->findOrFail($user->user_id);
                event( new EventActivityRecordUserRegistered($stdClass));
                event( new EventActivityRecordUserLogged($stdClass));

                DB::commit();
                return $user;

            }

            /** Update Register **/
            $up = $this->oauth->where('google_id', '=', $data['id'])
                ->update([
                    'name' => isset( $data['name'] ) ? $data['name'] : null,
                    'email' => isset( $data['email'] ) ? $data['email'] : null,
                    'picture' => isset( $data['picture'] ) ? $data['picture'] : null
                ]);

            //Array full User Shop
            if ($up) {

                $user = $this->oauth->with('users')
                    ->where('google_id', $data['id'])
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
     * Authenticate Via OAuth
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function authenticate(array $data)
    {

        DB::beginTransaction();

        try {

            if ($this->existsOAuthID($data['id']) === true) {

                $user = $this->oauth->with('users')
                    ->where('google_id', $data['id'])
                    ->first();

                $stdClass = new stdClass();
                $stdClass->new = $this->user->findOrFail($user->user_id);
                event( new EventActivityRecordUserLogged($stdClass));

                /** Update Register **/
                $this->oauth->where('google_id', '=', $data['id'])
                    ->update([
                        'name' => $data['name'],
                        'email' => isset( $data['email'] ) ? $data['email'] : null,
                        'picture' => isset( $data['picture'] ) ? $data['picture'] : null
                    ]);

                DB::commit();
                return $user;

            }

            DB::commit();

            throw new InvalidArgumentException( Config::get('constants.APP_IS_NOT_ASSOCIATED') );

        } catch (QueryException $e) {

            DB::rollBack();

        }

    }

}
