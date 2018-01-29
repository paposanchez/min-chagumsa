<?php

namespace App\Events\Certificate;

use App\Models\Certificate;
use Illuminate\Queue\SerializesModels;

// 평가서 발급완료
class OnCompleted extends Event {

        public $certificate;

        public function __construct(Certificate $certificate) {

                $this->certificate = $certificate;
        }

}
