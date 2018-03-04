<?php

namespace App\Events\Diagnosis;

use App\Models\Diagnosis;
use Event;

class OnDiagnosisCompleted extends Event {

        public $diagnosis;

        public function __construct(Diagnosis $diagnosis) {

                $this->diagnosis = $diagnosis;
        }

}
