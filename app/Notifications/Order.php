<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Mails\Mailable;


use App\Notifications\Channels\LgSmsChannel;
use App\Notifications\Messages\SmsMessage;
use App\Mail\Order as OrderMailable;

class Order extends Notification implements ShouldQueue {

        use Queueable;
        // protected $content;
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

                $notifiable->email = 'chali5124@gmail.com';

                $return = (new MailMessage)
                ->subject($this->order->orderer_name."님 에게 보내는 테스트")
                ->action('Verify Email', 'http://google.co.kr');

                return $return;
        }

        public function toLgSms($notifiable)
        {
                return (new SmsMessage)
                ->content($this->order->orderer_name."님 에게 보내는 테스트")
                ->from('18336889')
                ->to(["010-4186-5202"]);
        }


}
