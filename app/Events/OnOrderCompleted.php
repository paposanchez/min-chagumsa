<?php

namespace App\Events\Order;

use App\Models\Order;
use Illuminate\Queue\SerializesModels;

// 주문완료
class OnOrderCompleted extends Event {

        public $order;

        public function __construct(Order $order) {

                $this->order = $order;


        }

}
