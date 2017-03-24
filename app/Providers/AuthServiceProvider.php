<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use \App\Models\User;
use \App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //\App\Models\User::class => \App\Policies\Control\UserPolicy::class,
    ];

    /**
     *
     * Desativar para rodar as migrations
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {

        $this->registerPolicies($gate);

        /**
         * Comentar para rodar as migrations
         */
        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission) {
            $gate->define($permission->name, function(User $user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }

        /**
         * Passa antes de tudo pelo gate before.
         * Se o usuario for administrator não passa pelo foreach anterior
         *
         * @return bool
         */
        $gate->before(function (User $user){

            if ($user->hasAnyRoles('administrator'))
                return true;

        });

    }

}
