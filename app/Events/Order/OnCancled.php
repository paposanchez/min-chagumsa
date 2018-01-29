<?php

namespace App\Events\Order;

use App\Models\Order;
use Illuminate\Queue\SerializesModels;

// 주문취소
class OnCancled extends Event {

        public $order;

        public function __construct(Order $order) {

                $this->order = $order;
        }

}
