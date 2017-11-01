<?php

namespace App\Http\Controllers\Bcs;

use App\Events\SendSms;
use App\Models\Diagnosis;
use App\Models\Role;
use App\Models\UserExtra;
use App\Repositories\DiagnosisRepository;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\Code;
use App\Models\PaymentCancel;
use App\Models\Purchase;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Illuminate\Support\Facades\Mail;

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
        $search_fields = [
            "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name' => '주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];
        $user = Auth::user();

        $where = Order::where('status_cd', ">=", 102)->orderBy('created_at', 'DESC')->where('garage_id', $user->id);
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

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어

        if ($sf && $s) {
            if ($sf != "order_num") {
                if (in_array($sf, ["car_number", "orderer_name", "orderer_mobile"])) {
                    $where->where($sf, 'like', '%' . $s . '%');
                }
            } else {
                $order_split = explode("-", $s);
                if (count($order_split) == 2) {
                    $datekey = $order_split[1];
                    $car_number = $order_split[0];
                    $date_array = str_split($datekey, 2);

                    $date = Carbon::create('20' . '' . $date_array[0], $date_array[1], $date_array[2], '0', '0', '0');
                    $next_day = Carbon::create('20' . '' . $date_array[0], $date_array[1], $date_array[2], '0', '0', '0')->addDay(1);

                    $where->where('car_number', $car_number)
                        ->where('created_at', '>=', $date)
                        ->where('created_at', '<=', $next_day);
                } else {
                    if (strlen($s) > 6) {
                        $where = $where->where('car_number', $s);
                    } else {
                        $date_array = str_split($s, 2);
                        $date = Carbon::create('20' . '' . $date_array[0], $date_array[1], $date_array[2], '0', '0', '0');
                        $next_day = Carbon::create('20' . '' . $date_array[0], $date_array[1], $date_array[2], '0', '0', '0')->addDay(1);

                        $where->where('created_at', '>=', $date)->where('created_at', '<=', $next_day);
                    }

                }
            }
        }

        $entrys = $where->paginate(25);

        $engineers = $where = User::select('users.*')->join('user_extras', function($extra_qry){
            $extra_qry->on('users.id', 'user_extras.users_id');
        })->join('role_user', function($role_user_qry){
            $role_user_qry->on('user_extras.users_id', 'role_user.user_id');
        })->join('roles', function($role_qry){
            $role_qry->on('role_user.role_id', 'roles.id');
        })->where('role_user.role_id', 5)->where('user_extras.garage_id', Auth::user()->id)->orderBy('created_at', 'DESC')->pluck('name', 'id');;

        return view('bcs.order.index', compact('search_fields', 'entrys', 'engineers', 'status_cd', 's', 'sf', 'trs', 'tre'));
    }


    /**
     * @param Int $id
     * 주문 상세보기 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        $payment = Payment::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);
        $payment_cancel = PaymentCancel::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);

        $garages = UserExtra::orderBy(DB::raw('field(area, "서울시")'), 'desc')->groupBy('area')->whereNotNull('aliance_id')->get();

        //bcs에 속한 정비사 리스트
        $engineers = User::select('users.*')->join('user_extras', function($extra_qry){
            $extra_qry->on('users.id', 'user_extras.users_id');
        })->join('role_user', function($role_user_qry){
            $role_user_qry->on('user_extras.users_id', 'role_user.user_id');
        })->join('roles', function($role_qry){
            $role_qry->on('role_user.role_id', 'roles.id');
        })->where('role_user.role_id', 5)->where('user_extras.garage_id', Auth::user()->id)->orderBy('created_at', 'DESC')->pluck('name', 'id');
        $technicians = Role::find(6)->users->pluck('name', 'id');

        return view('bcs.order.detail', compact('order', 'payment', 'payment_cancel', 'brands', 'garages', 'engineers', 'technicians'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userUpdate(Request $request){
        $this->validate($request, [
            'mobile' => 'required'
        ], [],
            [
                'mobile' => '주문자연락처'
            ]);
        $order = Order::findOrFail($request->get('id'));
        $order->orderer_mobile = $request->get('mobile');
        $order->save();

        return redirect()->back()->with('success', '주문정보가 수정되었습니다.');
    }

    /**
     * @param Request $request
     * 고객의 차량 정보 변경
     * 차량번호, 침수여부, 사고여부 변경
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
     * 주문에 대한 정비사 변경
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bcsUpdate(Request $request)
    {
        $this->validate($request, [
            'engineer' => 'required'
        ], [],
            [
                'engineer' => '엔지니어'
            ]);

        $order = Order::findOrFail($request->get('id'));
        $order->garage_id = Auth::user()->id;
        $order->engineer_id = $request->get('engineer') == 0 ? $order->engineer_id : $request->get('engineer');
        $order->save();

        return redirect()->back()->with('success', 'BCS정보가 수정되었습니다.');
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

    /**
     * @param Request $request
     * 주문취소
     * 현재 주문이 입고 이후의 상태면 취소가 불가능하다.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function orderCancel(Request $request){
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
                            $message = "결제취소를 완료 하였습니다.";
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

        return redirect()->route('bcs.order.show', $order_id)
            ->with($event, $message);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
