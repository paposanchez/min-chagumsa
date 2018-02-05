<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Order as OrderModel;

class Order extends Mailable
{
        use Queueable, SerializesModels;

        protected $order;

        public function __construct(OrderModel $order)
        {
                $this->order = $order;
        }

        public function build()
        {

                // vendor.message.emails.ordering-user
                return $this->view('vendor.notifications.email')
                ->with([
                        'reservation'   => date('Y-m-d H:i:s'),
                        'level' => 'high',
                        'title' => '이건 테스트 입니다.',
                        'content' => '테스트 본문',
                        'garage' => '123',
                        'price' => 219291,
                ]);

        }
}
