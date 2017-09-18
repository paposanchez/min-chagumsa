<?php

namespace App\Events;

use App\Models\MmsTran;
use App\Models\ScTran;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
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
        $mobile_list = str_replace(array(', ', ','), '/', $mobiles);
        $mobile_lists = explode('/', $mobile_list);

//        $data = array(
//            array('user_id'=>'Coder 1', 'subject_id'=> 4096),
//            array('user_id'=>'Coder 2', 'subject_id'=> 2048),
//            //...
//        );
//
//        Model::insert($data); // Eloquent
//        DB::table('table')->insert($data);


        if(strlen($tr_sendstat) > 80){
            $mms = new  MmsTran();
            foreach ($mobile_lists as $mobile){
                $mms->send($mobile, $tr_callback, $subject, $mobiles, 'mms');
            }
        }else{
            $sms = new ScTran();
            foreach ($mobile_lists as $mobile) {
                $sms->send($mobile, $tr_callback, $content, $mobiles, $tr_msgtype);
            }

        }
    }
}
