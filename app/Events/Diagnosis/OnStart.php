<?php

namespace App\Events\Diagnosis;

use App\Models\Diagnosis;
use Illuminate\Queue\SerializesModels;

// 진단시작
class OnStart extends Event {

        public $diagnosis;

        public function __construct(Diagnosis $diagnosis) {

                $this->diagnosis = $diagnosis;
        }

}
