<?php

namespace App\Repositories\OAuth;

use App\Contracts\Repositories\OAuth\OAuthExistsInterface;
use App\Contracts\Repositories\OAuth\OAuthInterface;
use App\Events\Logs\User\EventActivityRecordUserLogged;
use App\Events\Logs\User\EventActivityRecordUserRegistered;
use Illuminate\Database\QueryException;
use App\Models\OAuth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use stdClass;

/**
 * Class TwitterRepository
 * @package App\Repositories\OAuth
 */
class TwitterRepository implements OAuthInterface, OAuthExistsInterface
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
     * TwitterRepository constructor.
     * @param OAuth $oauth
     * @param User $user
     * @param Role $role
     */
    public function __construct(OAuth $oauth, User $user, Role $role)
    {
        $this->oauth = $oauth;
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Verify exists id twitter registered
     * @param $value
     * @return mixed
     */
    public function existsOAuthID($value)
    {
        return $this->oauth->where('twitter_id', $value)->exists();
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

            if ($this->existsOAuthID($data['id_str']) !== true) {

                $role = $this->role->where('name', '=', 'shop_admin')->first();

                $this->user->name = isset($data['name']) ? $data['name'] : null;
                $this->user->registered_via_oauth = true;
                $this->user->save();
                $this->user->roles()->attach($role);

                $this->oauth->user_id = $this->user->id;
                $this->oauth->oauth_name = 'twitter';
                $this->oauth->oauth_slug_icon = 'twitter';
                $this->oauth->twitter_id = $data['id_str'];
                $this->oauth->name = isset( $data['name'] ) ? $data['name'] : null;
                $this->oauth->picture = isset( $data['profile_image_url'] ) ? $data['profile_image_url'] : null;
                $this->oauth->biography = isset( $data['description'] ) ? $data['description'] : null;
                $this->oauth->location = isset( $data['location'] ) ? $data['location'] : null;
                $this->oauth->site = isset( $data['entities']['url']['urls']['0']['expanded_url'] ) ? $data['entities']['url']['urls']['0']['expanded_url'] : null;
                $this->oauth->url = isset( $data['name'] ) ? $data['name'] : null;
                $this->oauth->save();
                $this->oauth->users()->attach($this->user->id);

                $user = $this->oauth->with('users')
                    ->where('twitter_id', $data['id'])
                    ->first();

                $stdClass = new stdClass();
                $stdClass->new = $this->user->findOrFail($user->user_id);
                event( new EventActivityRecordUserRegistered($stdClass));
                event( new EventActivityRecordUserLogged($stdClass));

                DB::commit();
                return $user;

            }

            /** Update Register **/
            $up = $this->oauth->where('twitter_id', '=', $data['id_str'])
                ->update([
                    'name' => isset( $data['name'] ) ? $data['name'] : null,
                    'picture' => isset( $data['profile_image_url'] ) ? $data['profile_image_url'] : null,
                    'biography' => isset( $data['description'] ) ? $data['description'] : null,
                    'location' => isset( $data['location'] ) ? $data['location'] : null,
                    'site' => isset( $data['entities']['url']['urls']['0']['expanded_url'] ) ? $data['entities']['url']['urls']['0']['expanded_url'] : null,
                    'url' => isset( $data['name'] ) ? $data['name'] : null
                ]);

            //Array full User Shop
            if ($up) {

                $user = $this->oauth->with('users')
                    ->where('twitter_id', $data['id'])
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
     * Autheticate Via OAuth
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function authenticate(array $data)
    {

        DB::beginTransaction();

        try {

            if ($this->existsOAuthID($data['id_str']) === true) {

                $user = $this->oauth->with('users')
                    ->where('twitter_id', $data['id'])
                    ->first();

                $stdClass = new stdClass();
                $stdClass->new = $this->user->findOrFail($user->user_id);
                event( new EventActivityRecordUserLogged($stdClass));


                /** Update Register **/
                $this->oauth->where('twitter_id', '=', $data['id_str'])
                    ->update([
                        'name' => isset( $data['name'] ) ? $data['name'] : null,
                        'picture' => isset( $data['profile_image_url'] ) ? $data['profile_image_url'] : null,
                        'biography' => isset( $data['description'] ) ? $data['description'] : null,
                        'location' =>isset( $data['location'] ) ? $data['location'] : null,
                        'site' => isset( $data['entities']['url']['urls']['0']['expanded_url'] ) ? $data['entities']['url']['urls']['0']['expanded_url'] : null,
                        'url' => isset( $data['name'] ) ? $data['name'] : null
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
