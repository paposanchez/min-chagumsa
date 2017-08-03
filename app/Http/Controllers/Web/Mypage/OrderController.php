<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\GarageInfo;
use App\Models\Item;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\PaymentCancel;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

use App\Tpay\TpayLib as Encryptor;


class OrderController extends Controller {

    //todo 현재 테스트 계정임. 변경할것
    protected $merchantKey = "VXFVMIZGqUJx29I/k52vMM8XG4hizkNfiapAkHHFxq0RwFzPit55D3J3sAeFSrLuOnLNVCIsXXkcBfYK1wv8kQ==";//상점키
    protected $mid = "tpaytest0m";//상점id
    protected $cancel_passwd = ""; //취소 시 사용되는 패스워드(Tpay 계정 설정 참조)

    public function index() {
        $user_id = Auth::user()->id;
        $my_orders = Order::where('orderer_id', $user_id)->orderBy('created_at', 'DESC')->get();

        return view('web.mypage.order.index', compact('my_orders'));
    }

    public function show($id) {

        $order = Order::findOrFail($id);
        $item = Item::findOrFail($order->item_id);
        $my_garage = GarageInfo::find($order->garage_id)->first();
        return view('web.mypage.order.show', compact('order', 'item', 'my_garage'));
    }

    public function editCar($order_id){
        $order = Order::where('id', $order_id)->first();
        $brands = Brand::select('id', 'name')->get();

        return view('web.mypage.order.edit_car', compact('order', 'brands'));
    }

    public function editGarage($order_id){
        $order = Order::where('id', $order_id)->first();
        $my_garage = GarageInfo::find($order->garage_id)->first();

//        $order->reservation->id
        $garages = GarageInfo::orderBy('area', 'ASC')->groupBy('area')->get();
        $search_fields = [
            '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시','15' => '15시','16' => '16시','17' => '17시'
        ];
        return view('web.mypage.order.edit_garage', compact('order', 'search_fields', 'garages', 'my_garage'));
    }

    public function update(Request $request, $order_id){
        $input = $request->all();
        $order = Order::findOrFail($order_id)->first();

        // 차량 정보 변경
        if(!empty($input['car_number'])){
            $validate = Validator::make($request->all(), [
                'brands_id' => 'required',
                'models_id' => 'required',
                'details_id' => 'required',
                'grades_id' => 'required',
                'car_number' => 'required'
            ]);

            if ($validate->fails())
            {
                return redirect()->back()->with('error', trans('web/mypage.modify_error'));
            }
            $car = Order::find($order_id)->car;
            $car->update($input);
            $order->update($input);
        }

        //입고 정보 변경
        if($request->get('reservation_date')){
            $validate = Validator::make($request->all(), [
                'reservation_date' => 'required',
                'sel_time' => 'required',
//                'name' => 'required',
//                'zipcode' => 'required',
//                'area' => 'required',
//                'section' => 'required'
            ]);

            if ($validate->fails())
            {
                return redirect()->back()->with('error', trans('web/mypage.modify_error'));
            }
            $date = new \DateTime($input['reservation_date'].' '.$input['sel_time'].':00:00');

            $reservation = $order->reservation;
            $reservation->reservation_at = $date->format('Y-m-d H:i:s');
            $reservation->save();

            if($request->get('address')){
                $my_garage = GarageInfo::find($order->garage_id)->first();
                $my_garage->area = $request->get('sel_area');
                $my_garage->section = $request->get('sel_section');
                $my_garage->address = $request->get('address');
                $my_garage->save();
            }


        }
        return redirect()
            ->route('mypage.order.show', $order->id)
            ->with('success', trans('web/mypage.modify_complete'));
    }

    public function cancel($order_id){


        $order = Order::find($order_id);

        //$cancelAmt = $order->item->price;
        $cancelAmt = 1004; //todo 가격부문을 위에 것으로 변경해야 함.


        $payment = Payment::where('orders_id', $order_id)->first();

        if($payment){
            $tid = $payment->tid;//거래아이디
//        $moid = $payment->moid;//상품주문번호
            $cancelMsg = "고객요청";
            $partialCancelCode = 0; //전체취소
            $dataType="json";

            $cancel_callback_url = url("/order/order-cancel-callback");

            $payActionUrl = "http://webtx.tpay.co.kr/payCancel";

            try{
                $encryptor = new Encryptor($this->merchantKey);
                $encryptData = $encryptor->encData($cancelAmt.$this->mid.$order_id);
                $ediDate = $encryptor->getEdiDate();
            }catch (\Exception $e){

                throw new Exception($e->getMessage());

            }

            $send_data = [
                "form_params" => [
                    'cc_ip' => $_SERVER['REMOTE_ADDR'],
                    'ediDate' => $ediDate,
                    'encryptData' => $encryptData,
                    'mid' => $this->mid,
                    'tid' => $tid,
                    'moid' => $order_id,
                    'cancelPw' => $this->cancel_passwd,
                    'cancelAmt' => $cancelAmt,
                    'cancelMsg' => $cancelMsg,
                    'partialCancelCode' => $partialCancelCode,
                    'dataType' => $dataType,
                    'returnUrl' => $cancel_callback_url
                ]
            ];

            $pay_cancel = new Client();
            $cancel_request = $pay_cancel->post($payActionUrl, $send_data);
            dd($payActionUrl, $send_data, $cancel_request);

            $message = trans('web/mypage.cancel_complete');
            $event = 'success';
        }else{
            $message = "해당 주문에 대한 결제정보를 확인하지 못하였습니다.\n관리자에게 문의해 주세요.";
            $event = 'error';
        }





        //주문상태 변경은 콜백에서 처리함
//        $order->status_cd = 100;
//        $order->save();



        return redirect()->route('mypage.order.index')
            ->with($event, $message);
    }



    public function reservation(){
        return view('web.mypage.order.show');
    }
}
