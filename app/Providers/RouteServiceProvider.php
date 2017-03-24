<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $this->mapApiRoutes();
        $this->mapWebRoutes();

        $this->mapControlAuthorizationRoutes();
        $this->mapControlShopUserRoutes();
        $this->mapControlUserRoutes();
        $this->mapControlPersonalRoutes();

        $this->mapAccountRoutes();
        $this->mapAccountOAuthRoutes();

        $this->mapControlDashboardRoutes();

        $this->mapAdminDashboardRoutes();
        $this->mapDeskDashboardRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }


    /**
     * Define the "Account" routes for the application.
     * @return void
     */
    protected function mapAccountRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/account/routes.php'));
    }

    /**
     * Define the "Account/OAuth" routes for the application.
     * @return void
     */
    protected function mapAccountOAuthRoutes()
    {
        Route::prefix('oauth')
             ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/account/oauth.php'));
    }


    /**
     * Define the "Control/Dashboard" routes for the application.
     * @return void
     */
    protected function mapControlDashboardRoutes()
    {
        Route::prefix('painel')
             ->middleware(['web', 'auth', 'user.admin'])
             ->namespace($this->namespace)
             ->group(base_path('routes/control/dashboard.php'));
    }


    /**
     * Define the "Admin/Dashboard" routes for the application.
     * @return void
     */
    protected function mapAdminDashboardRoutes()
    {
        Route::prefix('admin')
             ->middleware(['web', 'auth', 'user.admin'])
             ->namespace($this->namespace)
             ->group(base_path('routes/admin/dashboard.php'));
    }

    /**
     * Define the "Desk/Dashboard" routes for the application.
     * @return void
     */
    protected function mapDeskDashboardRoutes()
    {
        Route::prefix('desk')
             ->middleware(['web', 'auth', 'user.admin'])
             ->namespace($this->namespace)
             ->group(base_path('routes/desk/dashboard.php'));
    }

    /**
     * Define the "Control/Authorization" routes for the application.
     * @return void
     */
    protected function mapControlAuthorizationRoutes()
    {
        Route::prefix('painel/authorization')
             ->middleware(['web', 'auth', 'user.admin'])
             ->namespace($this->namespace)
             ->group(base_path('routes/control/authorization.php'));
    }


    /**
     * Define the "Control/Personal" routes for the application.
     * @return void
     */
    protected function mapControlPersonalRoutes()
    {
        Route::prefix('painel/account/personal')
             ->middleware(['web', 'auth', 'user.admin'])
             ->namespace($this->namespace)
             ->group(base_path('routes/control/account/personal.php'));
    }


    /**
     * Define the "Control/Shop/User" routes for the application.
     * @return void
     */
    protected function mapControlShopUserRoutes()
    {
        Route::prefix('painel/shop/user')
             ->middleware(['web', 'auth', 'user.admin'])
             ->namespace($this->namespace)
             ->group(base_path('routes/control/shop/user.php'));
    }

    /**
     * Define the "Control/User" routes for the application.
     * @return void
     */
    protected function mapControlUserRoutes()
    {
        Route::prefix('painel/user')
             ->middleware(['web', 'auth', 'user.admin'])
             ->namespace($this->namespace)
             ->group(base_path('routes/control/user.php'));
    }

}
