<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Diagnosis;
use App\Models\Certificate;
use App\Models\Warranty;
use App\Observers\OrderObserver;
use App\Observers\OrderItemObserver;
use App\Observers\DiagnosisObserver;
use App\Observers\CertificateObserver;
use App\Observers\WarrantyObserver;

class AppServiceProvider extends ServiceProvider
{

        /**
        * Bootstrap any application services.
        *
        * @return void
        */
        public function boot(UrlGenerator $url)
        {
                //https://laravel-news.com/laravel-5-4-key-too-long-error
                // Schema::defaultStringLength(191);

                URL::forceScheme(env('APP_SECURE', false) === true ? 'https' : 'http');

                // add observers
                Order::observe(OrderObserver::class);
                OrderItem::observe(OrderItemObserver::class);
                Diagnosis::observe(DiagnosisObserver::class);
                Certificate::observe(CertificateObserver::class);
                Warranty::observe(WarrantyObserver::class);

        }

        /**
        * Register any application services.
        *
        * @return void
        */
        public function register()
        {


                if ($this->app->environment() !== 'production') {
                        // $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
                        // $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
                        // $this->app->register(\Orangehill\Iseed\IseedServiceProvider::class);

                        // swagger load
                        //     $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

                        // if(config('app.debug'))
                        // {
                        //         $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
                        // }

                }


        }
}
