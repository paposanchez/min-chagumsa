<?php

namespace App\Events\Certificate;

use App\Models\Certificate;
use Illuminate\Queue\SerializesModels;

// 평가서 만료
class OnUserLeaved extends Event {


        public function __construct() {

        }

}
