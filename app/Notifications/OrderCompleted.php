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

class OrderCompleted extends Notification implements ShouldQueue
{

    use Queueable;

    protected $order;
    protected $event = 'order.OnComplete';

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
//        $type_cd = 127;
//        // 수신 대상
//        $notifiable->email = $this->order->email;
//
//        $return = (new MailMessage)
//            ->subject($this->order->orderer_name . "님 에게 보내는 테스트")
//            ->action($this->getTemplate($type_cd), 'http://www.chagumsa.com');
//        return $return;
    }

    public function toLgSms($notifiable)
    {
        $type_cd = 128;

        return (new SmsMessage)
            ->content($this->getTemplate($type_cd))
            ->from('18336889')
            ->to(["010-7554-3505"]);
    }

    public function getTemplate($type_cd)
    {
        $order = $this->order;
        $event = $this->event;
        $notification = \App\Models\Notification::where('type_cd', $type_cd)->where('event', $event)->first();
        $content = str_replace(
            ['{RESERVATION_DATE}', '{GARAGE_NAME}', '{PRICE}', '{CHAKEY}', '{ORDERER_NAME}'],
            [$order->diagnosis->reservation_at->format('Y-m-d H'), $order->diagnosis->garage->name, $order->purchase->amount, $order->chakey, $order->orderer_name],
            $notification->template);

        return $content;
    }


}
