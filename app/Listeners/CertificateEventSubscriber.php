<?php

namespace App\Listeners;

class CertificateEventSubscriber {

        public function onCertificateStart($event) {
        }

        public function onCertificateIssued($event) {
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
