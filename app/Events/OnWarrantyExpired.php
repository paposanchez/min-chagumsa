<?php

namespace App\Events\Warranty;

use App\Models\Warranty;
use Event;

//보증서 만료
class OnWarrantyExpired extends Event {

        public $warranty;

        public function __construct(Warranty $warranty) {

                $this->warranty = $warranty;
        }

}
