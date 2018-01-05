<?php

namespace App\Listeners\Warranty;

use Illuminate\Auth\Events\Login;
use Activity;


// 인증서 만료
class OnExpired  {

        public function handle(Login $handler) {

        }
}
