<?php
namespace App\Events\Diagnosis;

use App\Models\Diagnosis;
use Event;

// 예약변경확정
class OnDiagnosisReserveCompleted extends Event {

        public $diagnosis;

        // 기존 BCS 아이디
        public $old_garage_id;

        public function __construct(Diagnosis $diagnosis, $old_garage_id = null) {

                $this->diagnosis = $diagnosis;
                $this->old_garage_id = $old_garage_id;

        }

}
