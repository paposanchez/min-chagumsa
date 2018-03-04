<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Activity;

class UserEventSubscriber implements ShouldQueue {

        /**
        * Handle user login events.
        */
        public function onUserLogin($event) {
                activity()->log('Login');
        }

        /**
        * Handle user logout events.
        */
        public function onUserLogout($event) {
                activity()->log('Logout');
        }

        public function onUserRegistered($event) {
                activity()->log('Registered');
        }

        public function onUserLeaved($event) {
                activity()->log('Leaved');
        }

        /**
        * Register the listeners for the subscriber.
        *
        * @param  Illuminate\Events\Dispatcher  $events
        */
        public function subscribe($events)
        {
                $events->listen(
                        'Illuminate\Auth\Events\Login',
                        'App\Listeners\UserEventSubscriber@onUserLogin'
                );

                $events->listen(
                        'Illuminate\Auth\Events\Logout',
                        'App\Listeners\UserEventSubscriber@onUserLogout'
                );

                $events->listen(
                        'Illuminate\Auth\Events\Register',
                        'App\Listeners\UserEventSubscriber@onUserRegistered'
                );

                $events->listen(
                        'App\Events\OnUserLeaved',
                        'App\Listeners\UserEventSubscriber@onUserLeaved'
                );
        }

}
