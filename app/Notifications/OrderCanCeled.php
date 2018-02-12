<?php
/**
 * Created by PhpStorm.
 * User: minseok
 * Date: 2018. 2. 12.
 * Time: PM 12:14
 */

namespace App\Notifications;


use App\Traits\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Mail\Mailable;
use App\Notifications\Channels\LgSmsChannel;
use App\Notifications\Messages\SmsMessage;

class OrderCanCeled extends Notification implements ShouldQueue
{
    use Queueable;
    use Template;

    protected $order;
    protected $event = 'order.OnCancled';

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return [LgSmsChannel::class];
    }

    public function toMail($notifiable)
    {
        $type_cd = 127;
        $order = $this->order;
        $event = $this->event;

        // 수신 대상
        $notifiable->email = $this->order->orderer_email;


        $return = (new MailMessage)
            ->subject($this->order->orderer_name . "님 에게 보내는 테스트")
            ->action($this->getTemplate($type_cd, $order, $event), 'http://www.chagumsa.com');

        return $return;
    }

    public function toLgSms($notifiable)
    {
        $type_cd = 128;
        $order = $this->order;
        $event = $this->event;


        return (new SmsMessage)
            ->content($this->getTemplate($type_cd, $order, $event))
            ->from('1833-6889')
            ->to([$order->orderer_mobile]);
    }
}