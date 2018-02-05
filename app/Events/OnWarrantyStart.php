<?php

namespace App\Events\Warranty;

use App\Models\Warranty;
use Illuminate\Queue\SerializesModels;

//보증서 발급시작
class OnWarrantyStart extends Event {

        public $warranty;

        public function __construct(Warranty $warranty) {

                $this->warranty = $warranty;
        }

}
