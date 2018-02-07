<?php

namespace App\Http\Controllers\Mobile\Mypage;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderCar;
use App\Models\OrderFeature;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Reservation;
use App\Models\PaymentCancel;
use App\Models\Code;
use App\Models\User;
use App\Models\UserExtra;
use App\Models\Role;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Mockery\Exception;
use DB;

use Illuminate\Support\Facades\Mail;
use App\Events\SendSms;

use App\Tpay\TpayLib as Encryptor;


class OrderController extends Controller
{
    protected $merchantKey;//상점키
    protected $mid;//상점id
    protected $cancel_passwd = "123456"; //취소 시 사용되는 패스워드(Tpay 계정 설정 참조)
    protected $api_key;

    public function __construct()
    {
        $this->merchantKey = env('PG_KEY');
        $this->mid = env('PG_ID');
        $this->cancel_passwd = env('PG_CANCEL');
        $this->api_key = env('PG_KEY');
    }

    /**
     * 내 주문목록 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $my_orders = Order::where('orderer_id', $user_id)->whereNotIn('status_cd', [101])
            ->orderBy('created_at', 'DESC')
            ->orderBy(DB::raw('CASE status_cd WHEN 100 THEN 9999 ELSE status_cd END'), 'ASC')
            ->paginate(10);

        return view('mobile.mypage.order.index', compact('my_orders'));
    }


    /**
     * 주문 상세보기 페이지
     * 주문 seq를 이용하여 정보 노출
     * @param Request $request
     * @return array
     */

    public function nextOrder(Request $request){

        $user_id = Auth::user()->id;

        $validate = Validator::make($request->all(),[
            'page' => 'int|required'
        ]);

        $result = [];

        if($validate->fails()){
            $result['status'] = 'error';
            $result['mag'] = '필수파라미터가 누락되었습니다.';
            return ['my_orders' => null, 'status' => 'error', 'msg' => '필수파라미터가 누락되었습니다.'];
        }else{

            $my_orders = Order::where('orderer_id', $user_id)->whereNotIn('status_cd', [101])
                ->orderBy('status_cd', 'ASC')
                ->orderBy(DB::raw('CASE status_cd WHEN 100 THEN 9999 ELSE status_cd END'), 'ASC')
                ->orderBy('created_at', 'DESC')->paginate(10);

            if($my_orders->count() > 0){
                $render = view('mobile.partials.my-oreder', compact('my_orders'))->render();
                return ['my_orders' => $render, 'status' => 'ok', 'msg' => ''];
            }else{
                return ['my_orders' => null, 'status' => 'ok', 'msg' => '추가 주문내용이 없습니다.'];
            }

        }
    }


    public function show($id)
    {
        $order = Order::find($id);
        $order_features = $order->order_features->map(function ($feature) {
            return $feature->feature->display();
        });
        $features = implode(', ', $order_features->toArray());
        return view('mobile.mypage.order.show', compact('order', 'features'));
    }

    /**
     * 예약변경 페이지
     * @param int $order_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function changeReservation($order_id)
    {

        $order = Order::findOrFail($order_id);

        if ($order->status_cd > 104) {
            return redirect()->back()->with('error', '잘못된 접근입니다. 관리자에게 문의해주세요.');
        }

        $my_garage = $order->garage;

        $garage_list = UserExtra::orderBy('area', 'DESC')->groupBy('area')->whereNotNull('aliance_id')->get();

        $chk_garage = UserExtra::find($order->garage_id);


        $search_fields = config('chagumsa.sel_hour');

        return view('mobile.mypage.order.reservation', compact('order', 'search_fields', 'my_garage', 'garage_list', 'chk_garage'));
    }

    /**
     * 예약 및 bcs정보 변경 메소드
     * @param Request $request
     * @param int $order_id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function updateReservation(Request $request, $order_id)
    {

        $validate = Validator::make($request->all(), [
            'garage_id' => 'required',
            'reservation_date' => 'required',
            'sel_time' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', '입고대리점을 선택하세요.');
        }


        $order = Order::findOrFail($order_id);
        $order->garage_id = $request->get('garage_id');
        $order->save();

        $order->reservation->reservation_at = Carbon::parse($request->get('reservation_date') . ' ' . $request->get('sel_time') . ':00:00');
        $order->reservation->garage_id = $request->get('garage_id');
        $order->push();

        //문자, 메일 송부하기
        $enter_date = $order->reservation->reservation_at;
        $garage_info = User::find($order->garage_id);
        $garage_extra = UserExtra::find($garage_info->id);

        $ceo_mobile = $garage_extra->ceo_mobile;
        $garage = $garage_info->name;
        $price = $order->item->price;

        try {
            //메일전송
            $mail_message = [
                'enter_date' => $enter_date, 'garage' => $garage, 'price' => $price
            ];
            Mail::send(new \App\Mail\Ordering($garage_info->email, "차검사 차량입고 예약시간이 변경되었습니다.", $mail_message, 'message.email.change-reservation-user'));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        try {
            // SMS전송
            $orderer_name = Auth::user()->name;
            $order_num = $order->getOrderNumber();
            $bcs_message = view('message.sms.change-reservation-bcs', compact('orderer_name', 'order_num', 'enter_date'));
            $user_message = view('message.sms.change-reservation-user', compact('enter_date', 'week_day', 'garage', 'address', 'tel', 'price'));
            event(new SendSms($order->orderer_mobile, '[차검사 예약 변경]', $user_message));
            event(new SendSms($ceo_mobile, '', $bcs_message));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        //발송 끝

        return redirect()
            ->route('mobile.mypage.order.show', $order->id)
            ->with('success', trans('web/mypage.modify_complete'));
    }

    /**
     * 차량정보 변경 페이지
     * @param Request $request
     * @param int $order_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function changeCar(Request $request, $order_id)
    {

        $order = Order::findOrFail($order_id);

        if ($order->status_cd > 104) {
            return redirect()->back()->with('error', '잘못된 접근입니다. 관리자에게 문의해주세요.');
        }

        return view('mobile.mypage.order.car', compact('order'));
    }

    /**
     * 차량정보 수정 메소드
     * @param Request $request
     * @param int $order_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCar(Request $request, $order_id)
    {
        $this->validate($request, ['car_number' => 'required'], [], ['car_number' => '차량번호']);

        $order = Order::findOrFail($order_id);
        $order->flooding_state_cd = $request->get('flooding');
        $order->accident_state_cd = $request->get('accident');
        $order->car_number = $request->get('car_number');
        $order->save();

        return redirect()
            ->route('mobile.mypage.order.show', $order->id)
            ->with('success', trans('web/mypage.modify_complete'));
    }

    /**
     * 주문 취소 메소드
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Request $request)
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
                    //        $moid = $payment->moid;//상품주문번호
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

                //문자, 메일 송부하기
                if ($event == 'success') {
                    $enter_date = $order->created_at;
                    $garage_info = User::find($order->garage_id);
                    $garage = $garage_info->name;
                    $price = $order->item->price;
                    try {
                        //메일전송

                        $mail_message = [
                            'enter_date' => $enter_date, 'garage' => $garage, 'price' => $price
                        ];
                        Mail::send(new \App\Mail\Ordering(Auth::user()->email, "차검사 주문[" . $order->getOrderNumber() . "]이 취소되었습니다.",
                            $mail_message, 'message.email.cancel-ordering-user'));
                    } catch (\Exception $e) {
                    }

                    try {
                        // SMS전송
                        //사용자
                        $user_message = view('message.sms.cancel-ordering-user')->render();
                        event(new SendSms($order->orderer_mobile, '', $user_message));

                        //BCS
                        $orderer_name = Auth::user()->name;
                        $order_num = $order->getOrderNumber();
                        $bcs_message = view('message.sms.cancel-ordering-bcs', compact('orderer_name', 'order_num'));
                        event(new SendSms($garage_info->ceo_mobile, '', $bcs_message));

                    } catch (\Exception $e) {
                    }
                    //발송 끝
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

        return redirect()->route('mobile.mypage.order.index')
            ->with($event, $message);
    }
}
