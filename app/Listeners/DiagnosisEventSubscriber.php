<?php

namespace App\Listeners;

use Notification;
use Illuminate\Events\Dispatcher;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use App\Models\Diagnoses;
// use App\Models\Diagnosis;
// use App\Models\Code;

class DiagnosisEventSubscriber {

        // 예약
        public function onDiagnosisReserved($event) {
                // $this->notify(new OrderCanCeled($obj->order));
        }

        // 진단 예약 확정
        public function onDiagnosisReserveCompleted($event) {

        }

        // 진단시작
        public function onDiagnosisStart($event) {

        }

        // 진단완료
        public function onDiagnosisCompleted($event) {
                // Notification::send(['010-4186-5202'], new DiagnosisReviewComplete($event->diagnosis));
                (new \App\Models\ScTran)->send('010-4186-5202', '이건 안오나요?');
        }

        //진단 발급
        public function onDiagnosisIssued($event) {
                // $data = Diagnosis::find($this->id);
                // $report_type = 'D';
                //
                // // 진단관련
                // $total_opinion = Diagnoses::where('diagnosis_id', $data->id)->where('group', 2142)->first()->comment;
                // return view('document_layout.document', compact('data', 'report_type', 'total_opinion'));
        }

        // 진단만료
        public function onDiagnosisExpired($event) {
        }

        /**
        * Register the listeners for the subscriber.
        *
        * @param  Illuminate\Events\Dispatcher  $events
        */
        public function subscribe(Dispatcher $events)
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
