<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(){
        return view('admin.sms.index');
    }

    public function sendSms(Request $request){
        //$tr_senddate, $tr_phone, $tr_callback, $tr_msg, $tr_sendstat=0, $tr_msgtype=1
        try{
            $mobiles = str_replace(array(', ', ','), '/', $request->get('mobiles'));
            $mobile_list = explode('/', $mobiles);

            foreach ($mobile_list as $mobile) {
                $tr_phone = $mobile;
                $tr_callback = "18336889";
                $tr_msg = $request->get('content');
                $tr_sendstat = 0;
                $tr_msgtype = 0;

                $sms_model = new \App\Models\ScTran();
                $send = $sms_model->send($tr_phone, $tr_callback, $tr_msg, $tr_sendstat, $tr_msgtype);

            }
            return response()->json('success');
        }catch (\Exception $ex){
            return response()->json('fail');
        }
    }

    public function totalBcs(){
        $garages = Role::find(4)->users;
        $bcs_numbers = [];

        foreach ($garages as $key=>$garage){
            $bcs_numbers[] = $garage->mobile;
        }
        return response()->json($bcs_numbers);
    }

}