<?php

namespace App\Http\Controllers\Admin;


use App\Events\SendSms;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Notifications\Messages\SmsMessage;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * sms 전송 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('admin.sms.index');
    }

    /**
     * @param Request $request
     * sms 전송 메소드
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendSms(Request $request){
        try{
            $content = $request->get('content');

            (new SmsMessage())
                ->content($request->get('content'))
                ->from('18336889')
                ->to($request->get('mobiles'));
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