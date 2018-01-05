<?php

namespace App\Listeners;

use App\Events\UserAccess as UserAccessEvent;
use App\Services\Locale;
use Illuminate\Support\Facades\Route;
use Request;

class UserAccess {

    /**
     * Handle the event.
     *
     * @param  UserAccess  $event
     * @return void
     */
    public function handle(UserAccessEvent $event) {


        Locale::setLocale();

        // logging
        activity()->log(Request::fullUrl());
//        activity()->log(Request::fullUrl(), (auth()->check() ? auth()->id() : NULL));
    }

}
