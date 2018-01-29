<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

        /**
        * The event listener mappings for the application.
        *
        * @var array
        */
        protected $listen = [

                'Illuminate\Auth\Events\Login'          => ['App\Listeners\LoginSuccess'],
                'Illuminate\Auth\Events\Logout'         => ['App\Listeners\LogoutSuccess'],

                'App\Events\UserAccess'                 => ['App\Listeners\UserAccess'],
                'Illuminate\Auth\Events\Register'       => ['App\Listeners\RegisterSuccess'],

                'App\Events\Order\OnCompleted'          => ['App\Listeners\Order\OnCompleted'],
                'App\Events\Order\OnCancled'            => ['App\Listeners\Order\OnCancled'],

                'App\Events\Diagnosis\OnReservationChanged' => ['App\Listeners\Diagnosis\OnReservationChanged'],
                'App\Events\Diagnosis\OnReservationConfirmed' => ['App\Listeners\Diagnosis\OnReservationConfirmed'],
                'App\Events\Diagnosis\OnStart'          => ['App\Listeners\Diagnosis\OnStart'],
                'App\Events\Diagnosis\OnCompleted'      => ['App\Listeners\Diagnosis\OnCompleted'],
                'App\Events\Diagnosis\OnExpired'        => ['App\Listeners\Diagnosis\OnExpired'],

                'App\Events\Certificate\OnStart'        => ['App\Listeners\Certificate\OnStart'],
                'App\Events\Certificate\OnCompleted'    => ['App\Listeners\Certificate\OnCompleted'],
                'App\Events\Certificate\OnExpired'      => ['App\Listeners\Certificate\OnExpired'],

                'App\Events\Warranty\OnStart'           => ['App\Listeners\Warranty\OnStart'],
                'App\Events\Warranty\OnCompleted'       => ['App\Listeners\Warranty\OnCompleted'],
                'App\Events\Warranty\OnExpired'         => ['App\Listeners\Warranty\OnExpired'],

        ];

        /**
        * Register any events for your application.
        *
        * @return void
        */
        public function boot() {
                parent::boot();
        }


}
