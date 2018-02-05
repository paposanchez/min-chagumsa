<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\Channels\LgSmsChannel;
use App\Notifications\Messages\SmsMessage;

class Diagnosis extends Notification implements ShouldQueue {

        use Queueable;

        public function via($notifiable)
        {
                return [LgSmsChannel::class];
        }

        /**
        * Get the mail representation of the notification.
        *
        * @param  mixed  $notifiable
        * @return \Illuminate\Notifications\Messages\MailMessage
        */
        public function toLgSms($notifiable) {
                return (new SmsMessage)
                ->content("이건 노티파이에서 보내는 메세지 입니다.")
                ->from('18336889')
                ->to(["010-4186-5202"]);
        }


}
