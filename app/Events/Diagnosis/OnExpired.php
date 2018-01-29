<?php

namespace App\Events\Diagnosis;

use App\Models\Diagnosis;
use Illuminate\Queue\SerializesModels;

// 인증서 만료
class OnExpired extends Event {

        public $diagnosis;

        public function __construct(Diagnosis $diagnosis) {

                $this->diagnosis = $diagnosis;
        }

}
