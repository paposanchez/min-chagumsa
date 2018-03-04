<?php

namespace App\Notifications;

use App\Traits\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Mail\Mailable;


use App\Notifications\Channels\LgSmsChannel;
use App\Notifications\Messages\SmsMessage;
use App\Mail\Order as OrderMailable;


class DiagnosisReviewComplete extends Notification implements ShouldQueue
{

        use Queueable;
        use Template;

        protected $diagnosis;
        protected $event = 'diagnosis.ReviewComplete';


        public function __construct($diagnosis)
        {
                $this->diagnosis = $diagnosis;
        }

        public function via($notifiable)
        {
                return [LgSmsChannel::class];
        }


        public function toLgSms($notifiable)
        {
                return (new SmsMessage)
                ->from(config('chagumsa.sms_callback'))
                ->content('리뷰완료시 날아갑니다.');

                // ->content($this->getTemplate(128, $this->diagnosis->order, $this->event));
                // ->from('1833-6889')
                // ->to(['010-5269-0323']);


                // return (new SmsMessage)
                // ->content($this->getTemplate($type_cd, $order, $event))
                // ->from('1833-6889')
                // ->to(['010-5269-0323']);
        }


        // public function toMail($notifiable)
        // {
        //         //        $type_cd = 127;
        //         //        $order = $this->order;
        //         //        $event = $this->event;
        //         //
        //         //        // 수신 대상
        //         //        $notifiable->email = $this->order->orderer_email;
        //         //
        //         //
        //         //        $return = (new MailMessage)
        //         //            ->subject($this->order->orderer_name . "님 에게 보내는 테스트")
        //         //            ->action($this->getTemplate($type_cd, $order, $event), 'http://www.chagumsa.com');
        //         //
        //         //        return $return;
        // }



}
