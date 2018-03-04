<?php

namespace App\Listeners;

use Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;
use App\Models\Code;

class OrderEventSubscriber implements ShouldQueue {

        //주문완료
        public function onOrderCompleted($event) {
        }

        // 부분 취소
        public function onOrderPartCancled($event) {
        }

        // 주문취소
        public function onOrderCancled($event) {
        }

        public function subscribe($events)
        {
                $events->listen(
                        'App\Events\OnOrderCompleted',
                        'App\Listeners\OrderEventSubscriber@onOrderCompleted'
                );

                $events->listen(
                        'App\Events\OnOrderPartCancled',
                        'App\Listeners\OrderEventSubscriber@onOrderPartCancled'
                );

                $events->listen(
                        'App\Events\OnOrderCancled',
                        'App\Listeners\OrderEventSubscriber@onOrderCancled'
                );

        }

}
