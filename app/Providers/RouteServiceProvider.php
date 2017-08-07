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
        $this->mapWebRoutes();
        $this->mapApiRoutes();
        $this->mapAllianceRoutes();
        $this->mapBcsRoutes();
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
            // 'domain' => 'www.' .  config('app.domain'),
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

    protected function mapAllianceRoutes() {
        $namespace = $this->namespace . '\Alliance';

        Route::group([
            'middleware' => 'web',
            'namespace' => $namespace,
            'domain' => 'alliance.' . config('app.domain'),
                ], function ($router) {
            require base_path('routes/alliance.php');
        });
    }

    protected function mapBcsRoutes() {
        $namespace = $this->namespace . '\Bcs';

        Route::group([
            'middleware' => 'web',
            'namespace' => $namespace,
            'domain' => 'garage.' . config('app.domain'),
                ], function ($router) {
            require base_path('routes/bcs.php');
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
                ], function ($router) {
            require base_path('routes/api.php');
        });


        //@TODO swagger added        
        Route::namespace(config('l5-swagger.routes.api'))->group(function($ar){




        });

        // $router->any(config('l5-swagger.routes.docs').'/{jsonFile?}', [
        //     'as' => 'l5-swagger.docs',
        //     'middleware' => config('l5-swagger.routes.middleware.docs', []),
        //     'uses' => '\L5Swagger\Http\Controllers\SwaggerController@docs',
        // ]);

        // $router->get(config('l5-swagger.routes.api'), [
        //     'as' => 'l5-swagger.api',
        //     'middleware' => config('l5-swagger.routes.middleware.api', []),
        //     'uses' => '\L5Swagger\Http\Controllers\SwaggerController@api',
        // ]);


    }

}
