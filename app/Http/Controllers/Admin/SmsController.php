<?php

namespace App\Http\Controllers\Admin;


use App\Events\SendSms;
use App\Http\Controllers\Controller;
use App\Models\MmsTran;
use App\Models\Role;
use App\Notifications\Messages\SmsMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SmsController extends Controller
{

    /**
     * sms 전송 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.sms.index');
    }

    /**
     * @param Request $request
     * sms 전송 메소드
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendSms(Request $request)
    {
        try {

            $content = $request->get('content');
            $subject = $request->get('subject');
            $mobiles = $request->get('mobiles');

            $tr_callback = "18336889";
            $tr_sendstat = 0;
            $tr_msgtype = 0;
            $mobile_list = str_replace(array(', ', ',', '.', '. ', '/'), '/', $mobiles);
            $mobile_lists = explode('/', $mobile_list);
            $msg_list = [];


            $mms = new  MmsTran();
            foreach ($mobile_lists as $mobile) {
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
            return response()->json('success');
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    /**
     * BCS 정비소 전화번호 호출 메소드
     * 정비소 역할을 가진 유저의 전화번호를 노출
     * @return \Illuminate\Http\JsonResponse
     */
    public function totalBcs()
    {
        $garages = Role::find(4)->users;
        $bcs_numbers = [];

        foreach ($garages as $key => $garage) {
            $bcs_numbers[] = $garage->mobile;
        }
        return response()->json($bcs_numbers);
    }

}