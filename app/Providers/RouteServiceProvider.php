<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

        protected $namespace = 'App\Http\Controllers';

        public function boot() {
                parent::boot();
        }

        public function map() {

                $this->mapApiRoutes();
                $this->mapAdminRoutes();
                $this->mapWebRoutes();

        }

        protected function mapApiRoutes() {
                $namespace = $this->namespace . '\Api';
                Route::group([
                        'middleware' => 'api',
                        'namespace' => $namespace,
                        'domain' => 'api.' . config('app.domain'),
                ], function ($router) {
                        require base_path('routes/api.php');
                });
        }

        protected function mapCommonRoutes() {
                Route::group([
                        'namespace' => $this->namespace,
                ], function ($router) {
                        require base_path('routes/common.php');
                });
        }


        protected function mapAdminRoutes() {

                $namespace = $this->namespace . '\Admin';

                Route::group([
                        'middleware' => 'web',
                        'namespace' => $namespace,
                ], function ($router) {

                        Route::domain('manager.'. config('app.domain'))->group(base_path('routes/manager.php'));
                        // Route::domain('tech.'. config('app.domain'))->group(base_path('routes/tech.php'));
                        // Route::domain('bcs.'. config('app.domain'))->group(base_path('routes/bcs.php'));
                        // Route::domain('alliance.'. config('app.domain'))->group(base_path('routes/alliance.php'));
                        Route::domain('admin.'. config('app.domain'))->group(base_path('routes/admin.php'));
                });

        }


        protected function mapWebRoutes() {
                $namespace = $this->namespace . '\Web';
                Route::group([
                        'middleware' => 'web',
                        'namespace' => $namespace,
                        'domain' => 'www.' . config('app.domain'),
                ], function ($router) {
                        require base_path('routes/web.php');
                });
        }

}
