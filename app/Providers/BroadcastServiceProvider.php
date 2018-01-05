<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider {

        /**
        * Bootstrap any application services.
        *
        * @return void
        */
        public function boot() {
                Broadcast::routes();

                /*
                * zlara : 사용자 채널
                */
                //        Broadcast::channel('App.User.*', function ($user, $userId) {
                //            return (int) $user->id === (int) $userId;
                //        });

                require base_path('routes/channels.php');
        }

}
