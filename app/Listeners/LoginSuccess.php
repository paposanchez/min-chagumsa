<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Activity;

class LoginSuccess {

    /**
     * Handle the event.
     *
     * @param  Login  $login
     * @return void
     */
    public function handle(Login $login) {
        activity()->log('Login');
    }

}
