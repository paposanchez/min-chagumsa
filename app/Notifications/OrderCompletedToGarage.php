<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Notifications\Channels\LgSmsChannel;
use App\Notifications\Messages\SmsMessage;
use App\Mail\Order as OrderMailable;

class OrderCompleted extends Notification implements ShouldQueue {

        use Queueable;

        protected $order;

        public function __construct($order)
        {
                $this->order = $order;
        }

        public function via($notifiable)
        {
                return ['mail', LgSmsChannel::class];
        }

        public function toMail($notifiable)
        {

                // 수신 대상
                $notifiable->email = $this->order->orderer_email;

                $return = (new MailMessage)
                ->subject($this->order->orderer_name."님 에게 보내는 테스트");

                return $return;
        }

        public function toLgSms($notifiable)
        {
                return (new SmsMessage)
                ->content($this->order->orderer_name."님 에게 보내는 테스트")
                ->from('18336889')
                ->to([$this->order->orderer_mobile]);
        }


}
