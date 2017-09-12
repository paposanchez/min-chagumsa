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
use App\Models\Role;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use DB;

use App\Tpay\TpayLib as Encryptor;


class OrderController extends Controller
{

        //todo 현재 테스트 계정임. 변경할것
        protected $merchantKey;//상점키
        protected $mid ;//상점id
        protected $cancel_passwd = "123456"; //취소 시 사용되는 패스워드(Tpay 계정 설정 참조)
        protected $api_key;

    public function __construct()
    {
        $this->merchantKey = env('PG_KEY');
        $this->mid = env('PG_ID');
        $this->cancel_passwd = env('PG_CANCEL');
        $this->api_key = env('PG_KEY');
    }

    public function index()
    {
            $user_id = Auth::user()->id;
            //                $my_orders = Order::where('orderer_id', $user_id)->whereNotIn('status_cd', [101])
            //                ->orderBy('status_cd', 'ASC')
            //                ->orderBy(DB::raw('CASE status_cd WHEN 100 THEN 9999 ELSE status_cd END'), 'ASC')
            //                ->orderBy('created_at', 'DESC')->get();

            $my_orders = Order::where('orderer_id', $user_id)->whereNotIn('status_cd', [101])
            ->orderBy('status_cd', 'ASC')
            ->orderBy(DB::raw('CASE status_cd WHEN 100 THEN 9999 ELSE status_cd END'), 'ASC')
            ->orderBy('created_at', 'DESC')->paginate(10);

            return view('mobile.mypage.order.index', compact('my_orders'));
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

    public function changeReservation($order_id)
    {
            $order = Order::findOrFail($order_id);
            $my_garage = $order->garage;


        //     $reservation = $order->getReservation($order->id);

            //@TODO  Role을 통한 BCS 조회
            $users          = Role::find(4)->users;
            $areas          = [];
            $sections       = [];
            $garages        = [];
            foreach($users as $user) {

                    $areas[$user->user_extra->area] = $user->user_extra->area;

                    if($user->user_extra->area == $order->garage->user_extra->area) {
                            $sections[$user->user_extra->section] = $user->user_extra->section;
                    }

                    if($user->user_extra->area == $order->garage->user_extra->area &&  $user->user_extra->section == $order->garage->user_extra->section) {
                            $garages[$user->id] = $user->name;
                    }
            }

            $search_fields = [
                    '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시', '15' => '15시', '16' => '16시', '17' => '17시'
            ];
            return view('mobile.mypage.order.reservation', compact('order', 'search_fields', 'areas', 'sections', 'garages', 'my_garage'));
    }


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
            $order->push();


        //     $reservation = $order->reservation;
        //     $reservation->reservation_at = Carbon::now();
        //     $reservation->save();

            return redirect()
            ->route('mypage.order.show', $order->id)
            ->with('success', trans('web/mypage.modify_complete'));
    }


    public function changeCar(Request $request, $order_id)
    {

            $order = Order::findOrFail($order_id);
            $order_features = $order->order_features;
            $options_group = [
                    'car_option_exterior' => "외관",
                    'car_option_interior' => "내장",
                    'car_option_safety' => "안전",
                    'car_option_facilities' => "편의",
                    'car_option_multimedia' => "멀티미디어",
            ];

            $options = Code::whereIn('group', array_keys($options_group))->get();

            return view('mobile.mypage.order.car', compact('order', 'order_features',
            'options_group',
            'options',
            'order_features'
            ));
    }


    public function updateCar(Request $request, $order_id)
    {
            $order = Order::findOrFail($order_id);

            $order->flooding_state_cd = $request->get('flooding');
            $order->accident_state_cd = $request->get('accident');
            $order->car_number = $request->get('car_number');
            $order->save();

            //@TODO orderCar에 차량번호를 굳이 업데이트 해줘야 하는 이유가 없으면 빼는것으로
            // $order->orderCar->car_number = $request->get('car_number');
            // $order->orderCar->save();
            OrderFeature::replaceAll($order_id, $request->get('options_ck'));

            return redirect()
            ->route('mypage.order.show', $order->id)
            ->with('success', trans('web/mypage.modify_complete'));
    }


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
                            //                $cancelAmt = $order->item->price;
                            $cancelAmt = 1000; //todo 가격부문을 위에 것으로 변경해야 함.


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

                                                    //                            dd($cancel_process);

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

            return redirect()->route('mypage.order.index')
            ->with($event, $message);
    }


    public function reservation()
    {
            return view('mobile.mypage.order.show');
    }
}
