<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 9. 15.
 * Time: PM 8:44
 */

namespace App\Listeners;

use App\Events\SendSms as SendSmsEvent;
use App\Models\Order;
use Request;
use App\Services\Locale;
class SendSms
{
    /**
     * Handle the event.
     *
     * @param  UserAccess  $event
     * @return void
     */
    public function handle(SendSmsEvent $event) {

    }
}


