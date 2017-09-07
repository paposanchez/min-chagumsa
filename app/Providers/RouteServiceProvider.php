<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

        public function map() {
                $this->mapAdminRoutes();
                $this->mapAllianceRoutes();
                $this->mapBcsRoutes();
                $this->mapTechnicianRoutes();
                $this->mapApiRoutes();
                $this->mapWebRoutes();
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

        protected function mapMobileRoutes() {
                $namespace = $this->namespace . '\Mobile';

                Route::group([
                        'middleware' => 'web',
                        'namespace' => $namespace,
                        'domain' => 'm.' . config('app.domain'),
                ], function ($router) {
                        require base_path('routes/mobile.php');
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
                        'domain' => 'bcs.' . config('app.domain'),
                ], function ($router) {
                        require base_path('routes/bcs.php');
                });
        }

        protected function mapTechnicianRoutes() {
                $namespace = $this->namespace . '\Technician';

                Route::group([
                        'middleware' => 'web',
                        'namespace' => $namespace,
                        'domain' => 'tech.' . config('app.domain'),
                ], function ($router) {
                        require base_path('routes/technician.php');
                });
        }

        protected function mapApiRoutes() {
                $namespace = $this->namespace . '\Api';
                Route::group([
                        // 'middleware' => 'api',
                        'namespace' => $namespace,
                        'domain' => 'api.' . config('app.domain'),
                ], function ($router) {
                        require base_path('routes/api.php');
                });
        }

        protected function mapWebRoutes() {
                $namespace = $this->namespace . '\Web';
                Route::group([
                        'middleware' => 'web',
                        'namespace' => $namespace,
                        // 'domain' => config('app.domain'),
                        //            'domain' => config('app.domain'),
                ], function ($router) {
                        require base_path('routes/web.php');
                });
        }

}
