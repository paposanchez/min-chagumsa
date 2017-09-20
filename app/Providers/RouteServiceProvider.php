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

                $this->mapCertRoutes();
                $this->mapTechnicianRoutes();
                $this->mapBcsRoutes();
                $this->mapAllianceRoutes();
                $this->mapAdminRoutes();
                $this->mapApiRoutes();
                $this->mapMobileRoutes();
                $this->mapWebRoutes();
        }


        protected function mapCertRoutes() {
                $namespace = $this->namespace . '\Cert';
                Route::group([
                        'middleware' => 'web',
                        'namespace' => $namespace,
                        'domain' => 'cert.' . config('app.domain'),
                ], function ($router) {
                        require base_path('routes/cert.php');
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
                        'middleware' => 'api',
                        'namespace' => $namespace,
                        'domain' => 'api.' . config('app.domain'),
                ], function ($router) {
                        require base_path('routes/api.php');
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

        protected function mapWebRoutes() {
                $namespace = $this->namespace . '\Web';
                Route::group([
                        'middleware' => 'web',
                        'namespace' => $namespace,
                        'domain' => 'www.'.config('app.domain')
                ], function ($router) {
                        require base_path('routes/web.php');
                });
        }

}
