<?php

namespace App\Events\Diagnosis;

use App\Models\Diagnosis;
use Illuminate\Queue\SerializesModels;

//인증서 발급시작
class OnCompleted extends Event {

        public $diagnosis;

        public function __construct(Diagnosis $diagnosis) {

                $this->diagnosis = $diagnosis;
        }

}
