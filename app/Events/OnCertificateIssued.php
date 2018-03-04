<?php

namespace App\Events\Certificate;

use App\Models\Certificate;
use Event;


// 평가서 발급완료
class OnCertificateIssued extends Event {

        public $certificate;

        public function __construct(Certificate $certificate) {

                $this->certificate = $certificate;
        }

}
