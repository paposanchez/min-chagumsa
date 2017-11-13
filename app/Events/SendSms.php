<?php

namespace App\Events;

use App\Models\MmsTran;
use App\Models\ScTran;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Scalar\String_;

class SendSms extends Event {

    use SerializesModels;

    public $sendSms;

//    public function __construct(SendSms $sendSms) {

    public function __construct($mobiles, $subject, $content) {
        //$this->sendSms = $sendSms;\

        //todo 여기서 sms를 보내면 된다\

        $tr_callback = "18336889";
        $tr_sendstat = 0;
        $tr_msgtype = 0;
        $mobile_list = str_replace(array(', ', ',', '.', '. ', '/'), '/', $mobiles);
        $mobile_lists = explode('/', $mobile_list);
        $msg_list = [];


        if(intval(strlen($content)) > 80){
            $mms = new  MmsTran();
            foreach ($mobile_lists as $mobile){
                $msg_list[] = [
                    'REQDATE' => DB::raw('NOW()'),
                    'SUBJECT' => $subject,
                    'PHONE' => $mobile,
                    'CALLBACK' => $tr_callback,
                    'STATUS' => 0,
                    'MSG' => $content,
                    'type' => 0
                ];
            }
            $mms->insert($msg_list);
        }else{
            $sms = new ScTran();
            foreach ($mobile_lists as $mobile){
                $msg_list[] = [
                    'TR_SENDDATE' => DB::raw('NOW()'),
                    'TR_SENDSTAT' => $tr_sendstat,
                    'TR_MSGTYPE' => $tr_msgtype,
                    'TR_PHONE' => $mobile,
                    'TR_CALLBACK' => $tr_callback,
                    'TR_MSG' => $content,
                ];
            }
            $sms->insert($msg_list);
        }
    }
}
