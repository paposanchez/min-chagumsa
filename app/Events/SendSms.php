<?php

namespace App\Events;

use App\Models\MmsTran;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Scalar\String_;

class SendSms extends Event {

    use SerializesModels;

    public $sendSms;

//    public function __construct(SendSms $sendSms) {
    public function __construct($subject, $content) {
        //$this->sendSms = $sendSms;
        //todo 여기서 sms를 보내면 된다

        $mms = new  MmsTran();
        $mms->send('010-7554-3505', '1833-6889', $subject, $content, 'mms');
    }

}
