<?php

namespace App\Events\Diagnosis;

use App\Models\Diagnosis;
use Event;


//인증서 발급시작
class OnDiagnosisIssued extends Event {

        public $diagnosis;

        public function __construct(Diagnosis $diagnosis) {

                $this->diagnosis = $diagnosis;
        }

}
