<?php
namespace Riasad\Rolemanager;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Riasad\Rolemanager\Http\Middleware\Superadmin;
use Riasad\Rolemanager\Models\User;

class RolemanagerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        // Register your package's services and bindings here
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->publishes([
            __DIR__.'/../assets' => public_path('riasad/rolemanager'),
        ], 'public');
        
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views','rolemanager');

        $router->middlewareGroup('superadmin',[Superadmin::class]);

        config(['auth.providers.users.model' => User::class]);
    }
}

?>