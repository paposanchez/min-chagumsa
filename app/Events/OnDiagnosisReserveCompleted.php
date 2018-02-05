<?php


namespace App\Events\Diagnosis;


use App\Models\Diagnosis;
use Illuminate\Queue\SerializesModels;

// 예약변경확정
class OnDiagnosisReserveCompleted extends Event {

        public $diagnosis;

        public function __construct(Diagnosis $diagnosis) {

                $this->diagnosis = $diagnosis;
        }

}
