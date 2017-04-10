<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

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
    public function boot() {
        //
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map() {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes() {
        $namespace = $this->namespace . '\Web';
        Route::group([
            'middleware' => 'web',
            'namespace' => $namespace,
            'domain' => config('app.domain'),
                ], function ($router) {
            require base_path('routes/web.php');
        });
        
    }

    protected function mapAdminRoutes() {
        $namespace = $this->namespace . '\Admin';

        Route::group([
            'middleware' => 'web',
            'namespace' => $namespace,
            'domain' => 'admin.' . config('app.domain'),
                ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes() {
        $namespace = $this->namespace . '\Api';
        Route::group([
            'middleware' => 'api',
            'namespace' => $namespace,
            'domain' => 'api.' . config('app.domain'),
            'prefix' => 'api',
                ], function ($router) {
            require base_path('routes/api.php');
        });
    }

}
