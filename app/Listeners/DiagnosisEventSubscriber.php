<?php

namespace App\Listeners;

class DiagnosisEventSubscriber {

        // 진단 예약
        public function onDiagnosisReserved($event) {
        }

        // 진단 예약 확정
        public function onDiagnosisReserveCompleted($event) {
        }

        // 진단시작
        public function onDiagnosisStart($event) {
        }

        // 진단완료
        public function onDiagnosisCompleted($event) {
        }

        //진단 발급
        public function onDiagnosisIssued($event) {
        }

        // 진단만료
        public function onDiagnosisExpired($event) {
        }

        public function subscribe($events)
        {

                $events->listen(
                        'App\Events\OnDiagnosisReserved',
                        'App\Listeners\DiagnosisEventSubscriber@onDiagnosisReserved'
                );
                $events->listen(
                        'App\Events\OnDiagnosisReserveCompleted',
                        'App\Listeners\DiagnosisEventSubscriber@onDiagnosisReserveCompleted'
                );
                $events->listen(
                        'App\Events\OnDiagnosisStart',
                        'App\Listeners\DiagnosisEventSubscriber@onDiagnosisStart'
                );
                $events->listen(
                        'App\Events\OnDiagnosisCompleted',
                        'App\Listeners\DiagnosisEventSubscriber@onDiagnosisCompleted'
                );
                $events->listen(
                        'App\Events\OnDiagnosisIssued',
                        'App\Listeners\DiagnosisEventSubscriber@onDiagnosisIssued'
                );
                $events->listen(
                        'App\Events\OnDiagnosisExpired',
                        'App\Listeners\DiagnosisEventSubscriber@onDiagnosisExpired'
                );

        }

}
