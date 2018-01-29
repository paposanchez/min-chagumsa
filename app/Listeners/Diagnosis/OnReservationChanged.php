<?php

namespace App\Listeners\Diagnosis;


use Illuminate\Auth\Events\Diagnosis\OnReservationChanged;
use Activity;
use Log;


// 예약변경
class OnReservationChanged  {

        public function handle(OnReservationChanged $handler) {


                 Log::info("예약변경", $handler->diagnosis->id);

        }
}
