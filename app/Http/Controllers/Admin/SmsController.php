<?php

namespace App\Http\Controllers\Admin;


use App\Events\SendSms;
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
//            $mobiles = str_replace(array(', ', ','), '/', $request->get('mobiles'));
//            $mobile_list = explode('/', $mobiles);
            $content = $request->get('content');
            if(strlen($content) > 80){
                event(new SendSms($request->get('mobiles'), '제목', $content));
            }else{
                event(new SendSms($request->get('mobiles'), $request->get('subject'), $content));
            }

            return response()->json('success');
        }catch (\Exception $ex){
            return response()->json($ex->getMessage());
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