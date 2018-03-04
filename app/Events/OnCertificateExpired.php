<?php

namespace App\Events\Certificate;

use App\Models\Certificate;
use Illuminate\Queue\SerializesModels;
use Event;

// 평가서 만료
class OnCertificateExpired extends Event {

        public $certificate;

        public function __construct(Certificate $certificate) {

                $this->certificate = $certificate;
        }

}
