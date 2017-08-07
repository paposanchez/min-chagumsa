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
use App\Models\Code;

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
    protected $cancel_passwd = "123456"; //취소 시 사용되는 패스워드(Tpay 계정 설정 참조)
    protected $api_key = "hgEY70BdDgoJYVOwj5CHsRDQt5a6IieQLQv+Q2rA6nnW+wXP57fH2ZkvUBJW0c9/eF1Rp5QRZ+qjzJ+Knc8r1A==";

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

    public function cancel(Request $request){

        $validate = Validator::make($request->all(),[
            'order_id' => 'required'
        ]);


        if($validate->fails()){
            return redirect()->back()->with('error', '주문번호가 누락되었습니다.');
        }

        $order_id = $request->get('order_id');


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


            $payActionUrl = "https://webtx.tpay.co.kr/api/v1/refunds";
            /*
             *api_key
mid		상점아이디
moid		주문번호
cancel_pw		주문취소 비밀번호
cancel_amt		취소금액
partial_cancel	부분취소여부(0)
cancel_msg	취소사유
tid				거래TID

https://webtx.tpay.co.kr/api/v1/refunds
dataType: json + POST
             */

            try{
                $encryptor = new Encryptor($this->merchantKey);
                $encryptData = $encryptor->encData($cancelAmt.$this->mid.$order_id);
                $ediDate = $encryptor->getEdiDate();
            }catch (\Exception $e){

                throw new Exception($e->getMessage());

            }

            $send_data = [
                "form_params" => [

                    'mid' => $this->mid,
                    'api_key' => $this->api_key,
                    'moid' => $order_id,
                    'cancel_pw' => $this->cancel_passwd,
                    'cancel_amt' => $cancelAmt,
                    'partial_cancel' => 0,
                    'cancel_msg' => '고객요청',
                    'tid' => $tid
                ]
            ];

            $pay_cancel = new Client();
            $cancel_request = $pay_cancel->post($payActionUrl, $send_data);
            dd(\GuzzleHttp\json_decode($cancel_request->getBody()));

            $message = trans('web/mypage.cancel_complete');
            $event = 'success';
        }else{
            if(in_array($order->status_cd, [101, 102, 103, 104])){
                //주문상태가 결제 완료가 아니며, 주문신청/예약확인/입고대기/입고 상태까지만 주문 취소를 함.
                $order->status_cd = 100;
                $order->save();

                $message = trans('web/mypage.cancel_complete');
                $event = 'success';

            }else{

                $code = Code::find($order->status_cd);

                $message = "차량 입고 완료 및 차량 상태 점검의 경우 주문을 취소할수 없습니다.<br>입고 이전 주문이 취소 불가일경우 관리자에게 문의해 주세요.";
                if($code){
                    $message .= "<br>현재 상태: ".trans('code.order_state.'.$code->name);
                }
                $event = 'error';
            }

        }





        //주문상태 변경은 콜백에서 처리함




        return redirect()->route('mypage.order.index')
            ->with($event, $message);
    }



    public function reservation(){
        return view('web.mypage.order.show');
    }
}
