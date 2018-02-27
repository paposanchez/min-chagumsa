<?php

namespace App\Listeners;

use App\Models\Certificate;
use App\Models\Code;

class CertificateEventSubscriber {

        public function onCertificateStart($event) {
        }

        public function onCertificateIssued($event) {
            $data = Certificate::find($this->id);
            $report_type = 'C';

            // 평가관련
            $operation_state_cd = Code::getSelectList('operation_state_cd');
            $certificate_states = Code::getSelectList('certificate_state_cd');

            return view('document_layout.document', compact('data', 'report_type', 'operation_state_cd', 'certificate_states'));
        }

        public function onCertificateExpired($event) {
        }

        public function subscribe($events)
        {
                $events->listen(
                        'App\Events\onCertificateStart',
                        'App\Listeners\CertificateEventSubscriber@onCertificateStart'
                );

                $events->listen(
                        'App\Events\onCertificateIssued',
                        'App\Listeners\CertificateEventSubscriber@onCertificateIssued'
                );

                $events->listen(
                        'App\Events\onCertificateExpired',
                        'App\Listeners\CertificateEventSubscriber@onCertificateExpired'
                );
        }

}
