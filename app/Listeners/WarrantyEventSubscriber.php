<?php

namespace App\Listeners;

class WarrantyEventSubscriber {

        //발급시작
        public function onWarrantyStart($event) {
        }

        // 발급완료
        public function onWarrantyIssued($event) {
            // $data = Warranty::find($this->id);
            // $report_type = 'W';
            //
            // return view('document_layout.document', compact('data', 'report_type'));
        }

        // 발급거절
        public function onWarrantyRefused($event) {
        }

        // 발급만료
        public function onWarrantyExpired($event) {
        }

        public function subscribe($events)
        {
                $events->listen(
                        'App\Events\OnWarrantyStart',
                        'App\Listeners\WarrantyEventSubscriber@onWarrantyStart'
                );

                $events->listen(
                        'App\Events\OnWarrantyIssued',
                        'App\Listeners\WarrantyEventSubscriber@onWarrantyIssued'
                );

                $events->listen(
                        'App\Events\OnWarrantyRefused',
                        'App\Listeners\WarrantyEventSubscriber@onWarrantyRefused'
                );

                $events->listen(
                        'App\Events\OnWarrantyExpired',
                        'App\Listeners\WarrantyEventSubscriber@onWarrantyExpired'
                );
        }

}
