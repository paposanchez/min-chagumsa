<?php
namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use App\Models\MmsTran;
use App\Models\ScTran;
use DB;

final class LgSmsChannel
{

        /**
        * Send the given notification.
        *
        * @param  mixed  $notifiable
        * @param  \Illuminate\Notifications\Notification  $notification
        * @return void
        */
        public function send($notifiable, Notification $notification)
        {
                $message        = $notification->toLgSms($notifiable);

                if(mb_strlen($message->content) > 80){

                        foreach($message->to as $mobile)
                        {
                                MmsTran::create([
                                        'REQDATE'       => DB::raw('NOW()'),
                                        'SUBJECT'       => $message->subject,
                                        'PHONE'         => $this->format($mobile),
                                        'CALLBACK'      => $message->from,
                                        'STATUS'        => 0,
                                        'MSG'           => $message->content,
                                        'type'          => 0
                                ]);
                        }

                }else{

                        foreach($message->to as $mobile)
                        {
                                ScTran::create([
                                        'TR_SENDDATE'   => DB::raw('NOW()'),
                                        'TR_SENDSTAT'   => 0,
                                        'TR_MSGTYPE'    => 0,
                                        'TR_PHONE'      => $this->format($mobile),
                                        'TR_CALLBACK'   => $message->from,
                                        'TR_MSG'        => $message->content,
                                ]);
                        }
                }
        }

        private function format($mobile)
        {
                $mobile = preg_replace("/[^0-9]/", "", $mobile);

                if(strlen($mobile) == 10)
                {
                        return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $mobile);
                }else{
                        return preg_replace("/([0-9]{3})([0-9]{4})([0-9]{4})/", "$1-$2-$3", $mobile);
                }
        }


        // /**
        // * Fire the sending event for the prepared message.
        // */
        // private function fireSendingEvent(JetSMSMessageInterface $message)
        // {
        //         $this->dispatcher->fire(new SendingMessage($message));
        // }
        // /**
        // * Fire  the sent event for the message.
        // */
        // private function fireSentEvent($message, JetSMSApiResponseInterface $response)
        // {
        //         $this->dispatcher->fire(new MessageWasSent($message, $response));
        // }
}
