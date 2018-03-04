<?php

namespace App\Events\Diagnosis;

use App\Models\Warranty;
use Event;

class OnWarrantyIssued extends Event {

        public $diagnosis;

        public function __construct(Warranty $warranty) {

                $this->warranty = $warranty;
        }

}
