<?php

namespace App\Models;

use Gate;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'active', 'verification_token'
    ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        //retorno todos os papeis que o usuario desempenha no sistema.
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param Permission $permission
     * @return bool
     */
    public function hasPermission (Permission $permission)
    {
        //quais são os papeis que podem execultar essas tarefas?
        return $this->hasAnyRoles($permission->roles);
    }

    /**
     * @param $roles
     * @return bool
     */
    public function hasAnyRoles($roles)
    {

        //o usuario tem esse papel para execultar?
        if(is_array($roles) || is_object($roles) ) {
            return !! $roles->intersect($this->roles)->count();
        }

        //manager exemplo de nome
        return $this->roles->contains('name', $roles);

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function oauths()
    {
        return $this->belongsToMany(OAuth::class, 'oauth_user', 'user_id', 'oauth_id');
    }

}
