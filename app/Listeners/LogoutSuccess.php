<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Activity;

class LogoutSuccess {

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event) {
        activity()->log('Logout');
    }

}
