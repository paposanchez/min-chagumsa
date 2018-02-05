<?php

namespace App\Events\Certificate;

use App\Models\Certificate;
use Illuminate\Queue\SerializesModels;

// 평가시작
class OnCertificateStart extends Event {

        public $certificate;

        public function __construct(Certificate $certificate) {

                $this->certificate = $certificate;
        }

}
