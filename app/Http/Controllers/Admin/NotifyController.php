<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class NotifyController extends Controller
{
    /**
     * sms 전송 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('admin.notify.index');
    }

    /**
     * @param Request $request
     * sms 전송 메소드
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendSms(Request $request){
        try{
            $content = $request->get('content');

//            if(intval(strlen($content)) < 80){
//                event(new SendSms($request->get('mobiles'), 0, $content));
//            }else{
//                event(new SendSms($request->get('mobiles'), $request->get('subject'), $content));
//            }
            (new SmsMessage)
                ->content($this->order->orderer_name."님 에게 보내는 테스트")
                ->from('18336889')
                ->to(["010-4186-5202"]);
            return response()->json('success');
        }catch (\Exception $ex){
            return response()->json($ex->getMessage());
        }
    }

    /**
     * BCS 정비소 전화번호 호출 메소드
     * 정비소 역할을 가진 유저의 전화번호를 노출
     * @return \Illuminate\Http\JsonResponse
     */
    public function totalBcs(){
        $garages = Role::find(4)->users;
        $bcs_numbers = [];

        foreach ($garages as $key=>$garage){
            $bcs_numbers[] = $garage->mobile;
        }
        return response()->json($bcs_numbers);
    }


}
