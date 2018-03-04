<?php
namespace App\Events\Diagnosis;

use App\Models\Diagnosis;
use Event;

// 예약변경
class OnDiagnosisReserved  extends Event {

        public $diagnosis;

        public function __construct(Diagnosis $diagnosis) {

                $this->diagnosis = $diagnosis;
        }

}
