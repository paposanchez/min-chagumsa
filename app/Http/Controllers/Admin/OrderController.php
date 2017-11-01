<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendSms;
use App\Models\Diagnosis;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use App\Models\UserExtra;
use App\Models\Code;
use App\Models\PaymentCancel;
use App\Models\Purchase;
use App\Repositories\DiagnosisRepository;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



use Mockery\Exception;


class OrderController extends Controller
{
    /**
     * @param Request $request
     * 주문 인덱스 페이지
     * 주문상태, 검색기간, 검색어를 필터링하여 주문 검색
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $where = Order::where('status_cd', ">=", 100)->whereNotIn('status_cd', [101]);
        // 정렬옵션
        if ($request->get('sort') == 'order_num') {
            $where
                ->orderBy('car_number', 'ASC')
                ->orderBy('created_at', 'ASC');
        } else {
            $where->orderBy('id', 'DESC');
        }

        //주문상태
        $status_cd = $request->get('status_cd');
        if ($status_cd) {
            $where->where('status_cd', $status_cd);
        }

        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if ($trs && $tre) {
            //시작일, 종료일이 모두 있을때
            $where->where(function ($qry) use ($trs, $tre) {
                $qry->where("created_at", ">=", $trs)
                    ->where("created_at", "<=", $tre)
                    ->orWhere(function ($qry) use ($trs, $tre) {
                        $qry->where("updated_at", ">=", $trs)
                            ->where("updated_at", "<=", $tre);
                    });
            });
        } elseif ($trs && !$tre) {
            //시작일만 있을때
            $where->where(function ($qry) use ($trs) {
                $qry->where("created_at", ">=", $trs)
                    ->orWhere(function ($qry) use ($trs) {
                        $qry->where("updated_at", ">=", $trs);
                    });
            });
        }
        //검색조건
        $search_fields = [
            "order_id" => "주문아이디",
            "order_num" => "주문번호",
            "car_number" => "차량번호",
            'orderer_name' => '주문자 이름',
            "orderer_mobile" => "주문자 휴대전화번호",
            "engineer_name" => "엔지니어명",
            "bcs_name" => "BCS명",
            "tech_name" => "기술사명"
        ];


        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {
            switch ($sf) {
                case 'order_id':
                    $where->where('id', 'like', '%' . $s . '%');
                    break;
                case 'car_number':
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'order_num':
                    list($car_number, $datekey) = explode("-", $s);

                    if ($car_number && $datekey) {
                        $order_date = Carbon::createFromFormat('ymd', $datekey);
                        $where
                            ->where('car_number', $car_number)
                            ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
                            ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
                            ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'));
                    }
                    break;
                case 'orderer_name':
                    $where->where('orderer_name', 'like', '%' . $s . '%');
                    break;
                case 'orderer_mobile':
                    $where->where('orderer_mobile', 'like', '%' . $s . '%');
                    break;
                case 'engineer_name':
                    $where->whereHas('engineer', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });
                    break;
                case 'bcs_name':
                    $where->whereHas('garage', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });
                    break;
                case 'tech_name':
                    $where->whereHas('technician', function ($query) use ($s) {
                        $query->where('name', 'like', $s . '%');
                    });
                    break;
                case 'tech_name':
                    $where->whereHas('technician', function ($query) use ($s) {
                        $query->where('name', 'like', $s . '%');
                    });
                    break;
            }
        }
        $entrys = $where->paginate(25);

        //엔지니어 목록
        $engineers = Role::find(5)->users->pluck('name', 'id');

        return view('admin.order.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys', 'engineers', 'status_cd', 'sf', 's', 'tre', 'trs', 'status_cd'));
    }

    /**
     * @param Int $id
     * 주문 상세보기 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        //주문 seq번호에 의한 주문 검색
        $order = Order::findOrFail($id);
        //결제정보
        $payment = Payment::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);
        $payment_cancel = PaymentCancel::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);
        //주문에 대한 차량 정보
        $car = $order->car;
        //전체 정비소 리스트
        $garages = UserExtra::orderBy(DB::raw('field(area, "서울시")'), 'desc')->groupBy('area')->whereNotNull('aliance_id')->get();
        //전체 엔지니어 리스트
        $engineers = Role::find(5)->users->pluck('name', 'id');
        //전체 기술사 리스트
        $technicians = Role::find(6)->users->pluck('name', 'id');
        return view('admin.order.show', compact('order', 'payment', 'payment_cancel', 'car', 'garages', 'engineers', 'technicians'));
    }


    /**
     * @param Request $request
     * 주문 예약 변경
     * 예약날짜 및 상태 변경
     * 고객에게 메일, 문자 전송
     * @return \Illuminate\Http\JsonResponse
     */
    public function reservationChange(Request $request)
    {
        try {
            $order_id = $request->get('order_id');
            $date = $request->get('date');
            $time = $request->get('time');

            //예약날짜 변경
            $reservation_date = new DateTime($date . ' ' . $time . ':00:00');
            $reservation = Reservation::where('orders_id', $order_id)->first();
            $reservation->reservation_at = $reservation_date->format('Y-m-d H:i:s');
            $reservation->save();

            //주문의 상태를 예약 확인으로 변경
            $order = Order::find($order_id);
            $order->status_cd = 103;
            $order->save();

            //문자, 메일 송부하기
            $user_info = User::find($order->orderer_id);
            $enter_date = $reservation->reservation_at;
            $daily = array('일','월','화','수','목','금','토');
            $week_day = $daily[date('w', strtotime($enter_date))];
            $garage_info = User::find($order->garage_id);
            $garage = $garage_info->name;
            $garage_extra = UserExtra::where('users_id', $garage_info->id)->first();
            $address = $garage_extra->address;
            $tel = $garage_extra->phone;
            $price = $order->item->price;

            try {
                //메일전송
                $mail_message = [
                    'enter_date' => $enter_date, 'garage' => $garage, 'price' => $price
                ];
                Mail::send(new \App\Mail\Ordering($user_info->email, "차검사 차량입고 예약시간이 변경되었습니다.", $mail_message, 'message.email.change-reservation-user'));
            } catch (\Exception $e) {
                return response()->json($e->getMessage());
            }

            try{
                // SMS전송
                $user_message = view('message.sms.change-reservation-user', compact('enter_date', 'week_day', 'garage', 'address', 'tel', 'price'));
                event(new SendSms($order->orderer_mobile, '', $user_message));
            }catch (\Exception $e){
                return response()->json($e->getMessage());
            }
            //발송 끝


            return response()->json('success');
        } catch (Exception $ex) {
            return response()->json($ex->getMessage());
        }

    }

    /**
     * @param Int $order_id
     * 주문 예약 확정
     * 고객에게 예약 확정에 대한 메일, 문자 전송
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmation($order_id)
    {
        try {
            $reservation = Reservation::where('orders_id', $order_id)->first();
            $reservation->update([
                'updated_id' => Auth::user()->id,
                'updated_at' => Carbon::now()
            ]);

            $order = Order::find($order_id);
            $order->status_cd = 104;
            $order->save();

            //기존 진단데이터 삭제
            Diagnosis::where('orders_id', $order->id)->delete();

            $diagnosis = new DiagnosisRepository();
            $diagnosis->prepare($order->id)->create($order->id);

            //문자, 메일 송부하기
            $user_info = User::find($order->orderer_id);
            $enter_date = $reservation->reservation_at;
            $daily = array('일','월','화','수','목','금','토');
            $week_day = $daily[date('w', strtotime($enter_date))];
            $garage_info = User::find($order->garage_id);
            $garage = $garage_info->name;
            $garage_extra = UserExtra::where('users_id', $garage_info->id)->first();
            $address = $garage_extra->address;
            $tel = $garage_extra->phone;

            try{
                //메일전송
                $mail_message = [
                    'enter_date'=>$enter_date, 'week_day' => $week_day, 'garage' => $garage, 'address' => $address, 'tel' => $tel
                ];
                Mail::send(new \App\Mail\Ordering($user_info->email, "고객님의 차량입고 예약시간이 확정되었습니다.", $mail_message, 'message.email.confirmation-ordering-user'));
            }catch (\Exception $e){
                return response()->json($e->getMessage());
            }

            try{
                // SMS전송
                $user_message = view('message.sms.confirmation-ordering-user', compact('enter_date', 'week_day', 'garage', 'address', 'tel'));
                event(new SendSms($order->orderer_mobile, '', $user_message));
            }catch (\Exception $e){
                return response()->json($e->getMessage());
            }
            //발송 끝

            return response()->json(true);
        } catch (Exception $ex) {
            return response()->json(false);
        }

    }

    /**
     * @param Request $request
     * 고객 정보 변경
     * 차량번호, 침수여부, 사고여부 변경
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required'
        ], [],
            [
                'name' => '주문자명',
                'mobile' => '주문자연락처'
            ]);
        $order = Order::findOrFail($request->get('id'));
        $order->orderer_name = $request->get('name');
        $order->orderer_mobile = $request->get('mobile');
        $order->save();

        return redirect()->back()->with('success', '주문정보가 수정되었습니다.');

    }

    /**
     * @param Request $request
     * 고객의 차량 정보 변경
     * @return \Illuminate\Http\RedirectResponse
     */
    public function carUpdate(Request $request)
    {
        $this->validate($request, [
            'car_number' => 'required',

        ], [],
            [
                'car_number' => '차량번호',
            ]);

        $order = Order::findOrFail($request->get('id'));
        $order->car_number = $request->get('car_number');
        $order->flooding_state_cd = $request->get('flooding_state_cd');
        $order->accident_state_cd = $request->get('accident_state_cd');
        $order->save();
        return redirect()->back()->with('success', '차정보가 수정되었습니다.');
    }

    /**
     * @param Request $request
     * 주문에 대한 정비소 및 정비사 변경
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bcsUpdate(Request $request)
    {
        $this->validate($request, [
            'garages' => 'required',
            'engineer' => 'required'
        ], [],
            [
                'garages' => '차량번php호',
                'engineer' => '엔지니어'
            ]);

        $order = Order::findOrFail($request->get('id'));
        $order->garage_id = $request->get('garages');
        $order->engineer_id = $request->get('engineer');
        $order->save();

        $reservation = Reservation::where('orders_id', $order->id)->first();
        $reservation->garage_id = $request->get('garages');
        $reservation->save();

        return redirect()->back()->with('success', 'BCS정보가 수정되었습니다.');
    }

    /**
     * @param Request $request
     * 주문에 대한 기술사 변경
     * @return \Illuminate\Http\RedirectResponse
     */
    public function techUpdate(Request $request)
    {
        $this->validate($request, [
            'technician' => 'required',

        ], [],
            [
                'technician' => '차량번php호',
            ]);
        $order = Order::findOrFail($request->get('id'));
        $order->technist_id = $request->get('technician');
        $order->save();

        return redirect()->back()->with('success', '기술사정보가 수정되었습니다.');
    }

    /**
     * @param Request $request
     * 주문취소
     * 현재 주문이 입고 이후의 상태면 취소가 불가능하다.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function orderCancel(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'order_id' => 'required'
        ]);


        if ($validate->fails()) {
            return redirect()->back()->with('error', '주문번호가 누락되었습니다.');
        }

        $order_id = $request->get('order_id');


        $order = Order::find($order_id);
        $event = '';
        if ($order) {

            $purchase = Purchase::find($order->purchase_id);

            if (in_array($order->status_cd, [101, 102, 103, 104])) {
                $cancelAmt = $order->item->price;

                $payment = Payment::OrderBy('id', 'DESC')->whereIn('resultCd', [3001, 4000, 4100])
                    ->where('orders_id', $order_id)->first();
                if ($payment) {
                    $tid = $payment->tid;//거래아이디
                    $cancelMsg = "고객요청";
                    $partialCancelCode = 0; //전체취소
                    $dataType = "json";

                    $payment_cancel = PaymentCancel::OrderBy('id', 'DESC')->whereIn('resultCd', [2001, 2002])
                        ->where('orders_id', $order_id)->first();
                    if ($payment_cancel) {
                        if (in_array($payment_cancel->resultCd, [2001, 2002])) {
                            if ($order->status_cd != 100) {
                                //결제취소 PG연동은 완료 되었으나, order 상태가 변경 안됨.
                                $order->status_cd = 100;
                                $order->refund_status = 1;
                                $order->save();
                            }
                            $event = 'success';
                            $message = trans('web/mypage.cancel_complete');
                        }
                    } else {
                        $payment_cancel = new PaymentCancel();
                        $cancel_process = $payment_cancel->paymentCancelProcess($order_id, $cancelAmt, $tid);

                        if (in_array($cancel_process->result_cd, [2001, 2002])) {
                            if (isset($cancel_process->PayMethod)) $payment_cancel->payMethod = $cancel_process->PayMethod;
                            if (isset($cancel_process->CancelDate)) $payment_cancel->cancelDate = $cancel_process->CancelDate;
                            if (isset($cancel_process->CancelTime)) $payment_cancel->cancelTime = $cancel_process->CancelTime;
                            if (isset($cancel_process->result_cd)) $payment_cancel->resultCd = $cancel_process->result_cd;
                            $payment_cancel->cancelAmt = $cancelAmt;
                            $payment_cancel->orders_id = $order_id;
                            $payment_cancel->save();

                            //결제취소완료 또는 진행 중. 상태 업데이트 및 결제취소 로그 기록
                            $order->status_cd = 100;
                            $order->refund_status = 1;
                            $order->save();

                            //purchases 업데이트
                            if ($purchase) {
                                $purchase->status_cd = 100;
                                $purchase->save();
                            }

                            $message = trans('web/mypage.cancel_complete');
                            $event = 'success';
                        } else {
                            //                            dd($cancel_process);
                            $message = "해당 결제내역에 대한 결제취소를 진행할 수 없습니다.<br>";
                            if (isset($cancel_process->result_msg)) $message .= "결제취소 거부 사유: " . $cancel_process->result_msg;
                            $event = 'error';
                        }
                    }
                } else {
                    if (in_array($order->status_cd, [101, 102, 103, 104])) {
                        //주문상태가 결제 완료가 아니며, 주문신청/예약확인/입고대기/입고 상태까지만 주문 취소를 함.
                        $order->status_cd = 100;
                        $order->refund_status = 1;
                        $order->save();

                        //purchases 업데이트
                        if ($purchase) {
                            $purchase->status_cd = 100;
                            $purchase->save();
                        }
                        $message = trans('web/mypage.cancel_complete');
                        $event = 'success';
                    } else {
                        $code = Code::find($order->status_cd);

                        $message = "차량 입고 완료 및 차량 상태 점검의 경우 주문을 취소할수 없습니다.<br>입고 이전 주문이 취소 불가일경우 관리자에게 문의해 주세요.";
                        if ($code) {
                            $message .= "<br>현재 상태: " . trans('code.order_state.' . $code->name);
                        }
                        $event = 'error';
                    }
                }
            }//주문취소가 가능한 상태코드값
            else {
                $message = "주문취소는 차량 입고 이후에는 취소 불가입니다.<br>자세한 사항은 관리자에게 문의해 주세요.";
                $event = 'error';
            }//주문 상태가 입고완료로 진행되어 처리못함을 표시함.

        } else {
            $message = "해당 주문을 확인할 수 없습니다.<br>관리자에게 문의해 주세요.";
            $event = 'error';
        }

        if($event == 'success'){
            //문자, 메일 송부하기
            $orderer_name = $order->orderer_name;
            $order_number = $order->getOrderNumber();
            try {
                //메일전송=
                $mail_message = [
                    'enter_date' => $order->reservation->reservation_at, 'garage' => $order->garage, 'price' => $order->item->price
                ];
                Mail::send(new \App\Mail\Ordering($order->orderer->email, "제목", $mail_message, 'message.email.cancel-ordering-user'));
            } catch (\Exception $e) {
//                throw  new Exception($e->getMessage());
            }

            try {
                // SMS전송
                $bcs_message = view('message.sms.cancel-ordering-bcs', compact('orderer_name', '$order_num'));
                $user_message = view('message.sms.cancel-ordering-user');
                event(new SendSms($order->orderer_mobile, '[차검사 주문 취소]',$user_message));
                event(new SendSms($order->garage->user_extra->ceo_mobile, '[차검사 주문 취소]', $bcs_message));
            } catch (\Exception $e) {
            }
            //발송 끝
        }

        return redirect()->route('order.show', $order_id)
            ->with($event, $message);
    }

    /**
     * @param Request $request
     * 정비소 구/군 정보 리스트
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSection(Request $request)
    {
        $users = \App\Models\Role::find(4)->users;
        $sections = [];
        foreach ($users as $user) {
            if ($user->user_extra->area == $request->get('garage_area')) {
                $sections[$user->user_extra->section] = $user->user_extra->section;
            }
        }
        return response()->json(array_keys($sections));
    }

    /**
     * @param Request $request
     * 정비소명 정보 리스트
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAddress(Request $request)
    {
        $users = \App\Models\Role::find(4)->users;
        $garages = [];
        foreach ($users as $user) {
            if ($user->user_extra->area == $request->get('sel_area') && $user->user_extra->section == $request->get('sel_section')) {
                $garages[$user->id] = $user->name;
            }
        }
        return response()->json($garages);

    }

    /**
     * @param Request $request
     * 정비소 전체 주소 출력
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFullAddress(Request $request)
    {
        try {
            $garage_id = $request->get('garage_id');
            $full_address = UserExtra::where('users_id', $garage_id)->first()->address;
            if (!$full_address) {
                $full_address = new UserExtra();
            }
            return response()->json($full_address);
        } catch (\Exception $ex) {
            return response()->json('error');
        }
    }

    /**
     * @param Request $request
     * 엔지니어 리스트 출력
     * 엔지니어 롤을 가지고있다면, BCS도 같이 노출
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEngineer(Request $request)
    {
        try {
            $users = Role::findOrFail(5)->users;
            $engineers = [];

            foreach ($users as $user) {
                if (isset($user->user_extra->users_id)) {
                    if ($user->user_extra->users_id == $request->get('garage_id')) {
                        $engineers[$user->id] = $user->name;
                    }
                }

                if (isset($user->user_extra->garage_id)) {
                    if ($user->user_extra->garage_id == $request->get('garage_id')) {
                        $engineers[$user->id] = $user->name;
                    }
                }
            }

            return response()->json(array_unique($engineers));
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }

    }

    /**
     * @param Request $request
     * 진단 시작
     * 입고대기에 해당하는 주문을 진단 시작 할 수 있다.
     * @return \Illuminate\Http\JsonResponse
     */
    public function diagnosing(Request $request){
        try{
            $order_id = $request->get('order_id');
            $engineer_id = $request->get('engineer_id');

            $order = Order::findOrFail($order_id);

            $order->engineer_id = $engineer_id;
            $order->diagnose_at = new DateTime('now');
            $order->status_cd = 106;
            $order->save();

            return response()->json('success');
        }catch(\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }
}
