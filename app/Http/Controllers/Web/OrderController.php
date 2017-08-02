<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Code;
use App\Models\Detail;
use App\Models\GarageInfo;
use App\Models\Grade;
use App\Models\Item;
use App\Models\Models;
use App\Models\Order;
use App\Models\OrderFeature;
use App\Models\Purchase;
use App\Models\Reservation;
use App\Models\User;
use App\Models\UserExtra;
use Carbon\Carbon;

use App\Models\SmsTemp;
use App\Models\Payment;
use App\Models\PaymentResult;
use App\Models\ScTran;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Tpay\TpayLib as Encryptor;
use GuzzleHttp\Client;

class OrderController extends Controller {

    protected $merchantKey = "VXFVMIZGqUJx29I/k52vMM8XG4hizkNfiapAkHHFxq0RwFzPit55D3J3sAeFSrLuOnLNVCIsXXkcBfYK1wv8kQ==";//상점키
    protected $mid = "tpaytest0m";//상점id
    
    public function index(Request $request) {
//        if(!Auth::user()){
//            return redirect('login');
//        }
        $user = Auth::user();
        $brands = Brand::select('id', 'name')->get();
        $exterior_option = Code::where('group', 'car_option_exterior')->get();
        $interior_option = Code::where('group', 'car_option_interior')->get();
        $safety_option = Code::where('group', 'car_option_safety')->get();
        $facilities_option = Code::where('group', 'car_option_facilities')->get();
        $multimedia_option = Code::where('group', 'car_option_multimedia')->get();

        return view('web.order.index', compact('brands', 'exterior_option', 'interior_option', 'safety_option', 'facilities_option', 'multimedia_option', 'user'));
    }

    public function reservation(Request $request) {
        $validate = Validator::make($request->all(), [
            'orderer_name' => 'required',
            'orderer_mobile' => 'required',
            'car_number' => 'required',
            'brands_id' => 'required',
            'models_id' => 'required',
            'details_id' => 'required',
            'grades_id' => 'required',
            'flooding' => 'required',
            'accident' => 'required'
        ]);

        if ($validate->fails())
        {
            foreach ($validate->messages()->getMessages() as $field_name => $messages)
            {
//                var_dump($messages); // messages are retrieved (publicly)
            }
            return redirect()->back()->with('error', '입고예약에 대한 정보를 충분히 입력하세요.');
        }

        $search_fields = [
            '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시','15' => '15시','16' => '16시','17' => '17시'
        ];

        $garages = GarageInfo::orderBy('area', 'ASC')->groupBy('area')->get();

        return view('web.order.reservation', compact('search_fields', 'request', 'garages', 'garage_sections'));
    }

//    public function purchase(Request $request) {
//
//
//        return view('web.order.purchase', compact('order', 'items', 'request'));
//    }

    public function purchase(Request $request) {

        $datekey = substr(str_replace("-","",$request->reservaton_date), -6);

        $orderer_id = Auth::user()->id;

        $order = Order::where('datekey', $datekey)->where('car_number', $request->get('car_number'))->first();

        if(!$order){
            $order = new Order();
         }

        $car = Car::where('vin_number', $request->get('car_number'))->get()->first();
        if(!$car){
            $car = new Car();
            $car->vin_number = $request->get('car_number');
            $car->brands_id = $request->get('brands_id');
            $car->models_id = $request->get('models_id');
            $car->details_id = $request->get('details_id');
            $car->grades_id = $request->get('grades_id');
            $car->save();

        }
        $cars_id = $car->id; //자동차 ID 설정


        $order->datekey = $datekey;
        $order->car_number = $request->get('car_number');
        $order->cars_id = $car->id;
        $order->garage_id = $request->get('garage_id');
        $order->orderer_id = $orderer_id;
        $order->orderer_name = $request->get('orderer_name');
        $order->orderer_mobile = $request->get('orderer_mobile');
        $order->registration_file = 0;
        $order->open_cd = 1327; //default로 비공개코드 삽입
        $order->status_cd = 102;
        $order->flooding_state_cd = $request->get('flooding');
        $order->accident_state_cd = $request->get('accident');
        $order->item_id = 0;

        $purchase = new Purchase();
        $purchase->amount = 0; //결제 완료 후 update
        $purchase->type = 0; // 결제방법
        $purchase->status_cd = 101; // 결제상태
        $purchase->save();

        $order->purchase_id = $purchase->id;
        $order->save();



        $orders_id = $order->id;

        if($request->get('options_ck') != []){
            $order_features = OrderFeature::where('orders_id', $order->id)->first();
            if(!$order_features){
                $order_features = new OrderFeature();
            }else{
                OrderFeature::where('orders_id', $order->id)->delete();
            }
            $order_features_list = [];
            foreach ($request->get('options_ck') as $key => $options){
                $order_features_list[$key]['orders_id'] = $order->id;
                $order_features_list[$key]['features_id'] = $options;
            }
            $order_features->insert($order_features_list);
            $order_features->save();
        }
        $items = Item::all();
//        $order = Order::find(4)->first();

        $garage_info = GarageInfo::findOrFail($request->get('garage_id'));


        $date = new \DateTime($request->reservaton_date);

        $reservation_date = $date->format('Y년 m월d일');


        return view('web.order.purchase', compact('order', 'items', 'garage_info', 'request', 'datekey', 'cars_id', 'orders_id', 'reservation_date'));

    }


    /**
     * 결제 팝업
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentPopup(Request $request){

        $error = false;
        //validate
        $validate = Validator::make($request->all(), [
            'item_choice' => 'required', //인증서 상품 ID
            'payment_method' => 'required', // 결제 종류
            'id' => 'required', //주문서 ID,
            'buyerName' => 'required', //구매자 성명
            'buyerEmail' => 'required', // 구매자 이메일
            'product_name' => 'required', // 상품명
        ]);
        if ($validate->fails())
        {
            //error 를 view에서 받아 error가 true이면 결제창을 닫는다.
            $error = true;
        }else{

            // payment_method 11 - 신용카드, 12 - 실시간 계좌이체
            if(!in_array($request->get('payment_method'), [11, 12])){
                $error = true;
            }else{
                if($request->get('payment_method') == 11) {
                    $payMethod = 'CARD';
                }elseif ($request->get('payment_method') == 12){
                    $payMethod = 'BANK';
                }else{
                    $error = true;
                    //결제 방식이 카드,체크카드,실시간계좌이체 이외에는 error임.
                }
            }


            $order_model = Order::find($request->get('orders_id'));

            $moid = $request->get('id');



            //결제금액을 구함.
            $where = Item::find($request->get('item_id'));
            if($where){
                $amt = $where->price;//결제금액
            }else{
                $error = false;
            }

            $amt = $request->get('amt');
            //todo 결제비용 수정해야 함. 1004는 테스트용 비용임
            $amt = 1004;

            //todo 주문번호에 한글이 있으면 오류남




            //$ediDate, $mid, $merchantKey, $amt
            $encryptor = new Encryptor($this->merchantKey);

            $encryptData = $encryptor->encData($amt.$this->mid.$moid);
            $ediDate = $encryptor->getEdiDate();
            $vbankExpDate = $encryptor->getVBankExpDate();

            $payActionUrl = "https://webtx.tpay.co.kr";
            $payLocalUrl = url('/');   //각 상점 도메인을 설정 하세요.  ex)http://shop.tpay.co.kr





        }
        $buyerName = $request->get('buyerName');

        $buyerEmail = $request->get('buyerEmail');
        $buyerTel = $request->get('buyerTel');
        $product_name = $request->get('product_name');

        $mid = $this->mid;


        return view('web.order.payment-popup', compact('mid', 'merchantKey', 'amt', 'moid', 'encryptData',
                'ediDate', 'vbankExpDate', 'payActionUrl', 'payLocalUrl', 'payMethod', 'amt', 'buyerName', 'buyerEmail',
                'buyerTel', 'product_name', 'error')
        );


    }

    public function paymentResult(Request $request){

        //webTx에서 받은 결과값들
        $payMethod = $request->get('payMethod');//
        $mid = $request->get('mid');//
        $tid = $request->get('tid');//
        $mallUserId = $request->get('mallUserId');//
        $amt = $request->get('amt');//
        $buyerName = $request->get('buyerName');//
        $buyerTel = $request->get('buyerTel');//
        $buyerEmail = $request->get('buyerEmail');//
        $mallReserved = $request->get('mallReserved'); //없음.
        $goodsName = $request->get('goodsName');//
        $moid = $request->get('moid');//
        $authDate = $request->get('authDate');//
        $authCode = $request->get('authCode');//
        $fnCd = $request->get('fnCd');//
        $fnName = $request->get('fnName');//
        $resultCd = $request->get('resultCd');//
        $resultMsg = $request->get('resultMsg');//
        $errorCd = $request->get('errorCd'); //없음
        $errorMsg = $request->get('errorMsg'); //없음
        $vbankNum = $request->get('vbankNum'); //없음
        $vbankExpDate = $request->get('vbankExpDate'); //없음.
        $ediDate = $request->get('ediDate');//
        $BID = $request->get('BID');
        $cardPoint = $request->get('cardPoint');
        $cashReceiptType = $request->get('cashReceiptType');
        $usePoint = $request->get('usePoint');
        $cardNo = $request->get('cardNo');
        $balancePoint = $request->get('balancePoint');
        $cashTid = $request->get('cashTid');
        $rcvrCp = $request->get('rcvrCp');
        $rcvrMsg = $request->get('rcvrMsg');
        $cardQuota = $request->get('cardQuota');
        $cashNo = $request->get('cashNo');
        $rcvrNm = $request->get('rcvrNm');
        $stateCd = $request->get('stateCd');

        $transType = $request->get('transType');
        $encryptData = $request->get('encryptData');
        $quotaFixed = $request->get('quotaFixed');
        $supplyAmt = $request->get('supplyAmt');
        $vat = $request->get('vat');
        $billReqType = $request->get('billReqType');
        $receiptTypeNo = $request->get('receiptTypeNo');



        //todo moid값이 정확히 오는것을 확인하기 위하여 order_where 에 대한 체크를 구성 안함.

        try{
            $encryptor = new Encryptor($this->merchantKey, $ediDate);
            $decAmt = $encryptor->decData($amt); //실제 결제금액
            $decMoid = $encryptor->decData($moid); // 결제시 등록된 주문번호
        }catch (\Exception $e){
            $decAmt = null;
            $decMoid = null;

        }



        //등록된 정보 가져오기
        $order_where = Order::find($decMoid);
        if($order_where){
            $order_price = $order_where->item->price;
            $purchase_id = $order_where->purchase_id;

        }else{
            $order_where = new Order();
            $order_price = false;
            $purchase_id = false;

        }

        if( $decAmt != $order_price || $decMoid != $order_where->id ){
            $result = "결제처리 진행 중입니다.";
            $event = "";
        }else{


            //결제결과 purchase update
            $purchase = Purchase::find($purchase_id);
            $purchase->status_cd = 102;
            $purchase->amount =$decAmt;


            if($payMethod == 'CARD'){
                $purchase->type = 11;
            }elseif ($payMethod == 'BANK'){
                $purchase->type= 12;

                $purchase->refund_name = $buyerName;
                $purchase->refund_bank = $fnName;
                $purchase->refund_account = $vbankNum;//Tpay에서는 별도로 해당 코드가 없는것으로 보임. 실계좌 연결 시 테스트 필요함.
            }

            $purchase->save();

            //order 결제상태 변경
//            $order_where->item_id =;
            $order_where->status_cd = 102;
            $order_where->save();




            //상점DB처리
            //todo 1, payment, paymentResult 를 처리함. 2. order state를 업데이트 함.
            // 메뉴얼 구성상으로 보면 payment를 등록한 후 payemntResult를 등록하는것이 맞다
            // 그런데 연동으로 보면, 두 테이블이 동이에 처리되는 구조이다
            // 데이터 저장을 모두 확인한후 가능하다면 payment의 경우 popup에서 처리하고
            // 본 action에서는 paymentResult를 저장하는 방식으로 변경해야 한다.

            $payment = new Payment();
            //결제정보 등록
            $payment->payMethod = $payMethod;
            $payment->transType = $transType;
            $payment->goodsName = $goodsName;
            $payment->amt = $decAmt;
            $payment->moid = $moid;
            $payment->mallUserId = $mallUserId;
            $payment->buyerName = $buyerName;
            $payment->buyerTel = $buyerTel;
            $payment->buyerEmail = $buyerEmail;
            $payment->rcvrMsg = $rcvrMsg;
            $payment->ediDate = $ediDate;
            $payment->encryptData = $encryptData;
            $payment->quotaFixed = $quotaFixed;
            $payment->supplyAmt = $supplyAmt;
            $payment->vat = $vat;
            $payment->billReqType = $billReqType;
            $payment->tid = $tid;
            $payment->stateCd = $stateCd;
            $payment->authDate = $authDate;
            $payment->authCode = $authCode;
            $payment->fnCd = $fnCd;
            $payment->fnName = $fnName;
            $payment->resultCd = $resultCd;
            $payment->resultMsg = $resultMsg;
            $payment->cardQuota = $cardQuota;
            $payment->cardNo = $cardNo;
            $payment->cardPoint = $cardPoint;
            $payment->usePoint = $usePoint;
            $payment->balancePoint = $balancePoint;
            $payment->BID = $BID;
            $payment->cashReceiptType = $cashReceiptType;
            $payment->receiptTypeNo = $receiptTypeNo;
            $payment->cashNo = $cashNo;
            $payment->cashTid = $cashTid;
            $payment->mid = $mid;
            $payment->errorCd = $errorCd;
            $payment->errorMsg = $errorMsg;
            $payment->orders_id = $order_where->id;

            $payment->save();


            //결제결과 수신 여부 알림

            $url = 'https://webtx.tpay.co.kr/resultConfirm';

            if($tid){
                $client = new Client();
                $contents = $client->post($url, [
                    'form_params' => [
                        "tid" => $tid,
                        "result" => "000"
                    ]
                ]);
            }
            //todo 위의 처리를 완료한후 popup을 닫고 부모창(purchase)를 submit하여 complete한다.
            // result: 처리 결과 메세지(결제가 완료되었습니다. 또는 결제가 정상적으로 처리되지 못하였습니다.)
            // event: 팝업닫기 또는 뒤로가기 ( 'close', 'history.back()')

            $result = "결제가 완료 되었습니다";
            $event = "";
        }
        return view('web.order.payment-result', compact('result', 'event'));
    }

    /**
     * 결제 callback action. purchase에서 처리 에러가 발생시 콜백을 통하여 처리 가능함.
     * @param Request $request
     */
    public function payResult(Request $request){
        $payMethod = $request->get('payMethod');//
        $mid = $request->get('mid');//
        $tid = $request->get('tid');//
        $mallUserId = $request->get('mallUserId');//
        $amt = $request->get('amt');//
        $buyerName = $request->get('buyerName');//
        $buyerTel = $request->get('buyerTel');//
        $buyerEmail = $request->get('buyerEmail');//
        $mallReserved = $request->get('mallReserved'); //없음.
        $goodsName = $request->get('goodsName');//
        $moid = $request->get('moid');//
        $authDate = $request->get('authDate');//
        $authCode = $request->get('authCode');//
        $fnCd = $request->get('fnCd');//
        $fnName = $request->get('fnName');//
        $resultCd = $request->get('resultCd');//
        $resultMsg = $request->get('resultMsg');//
        $errorCd = $request->get('errorCd'); //없음
        $errorMsg = $request->get('errorMsg'); //없음
        $vbankNum = $request->get('vbankNum'); //없음
        $vbankExpDate = $request->get('vbankExpDate'); //없음.
        $ediDate = $request->get('ediDate');//
        $BID = $request->get('BID');
        $cardPoint = $request->get('cardPoint');
        $cashReceiptType = $request->get('cashReceiptType');
        $usePoint = $request->get('usePoint');
        $cardNo = $request->get('cardNo');
        $balancePoint = $request->get('balancePoint');
        $cashTid = $request->get('cashTid');
        $rcvrCp = $request->get('rcvrCp');
        $rcvrMsg = $request->get('rcvrMsg');
        $cardQuota = $request->get('cardQuota');
        $cashNo = $request->get('cashNo');
        $rcvrNm = $request->get('rcvrNm');
        $stateCd = $request->get('stateCd');

        $transType = $request->get('transType');
        $encryptData = $request->get('encryptData');
        $quotaFixed = $request->get('quotaFixed');
        $supplyAmt = $request->get('supplyAmt');
        $vat = $request->get('vat');
        $billReqType = $request->get('billReqType');
        $receiptTypeNo = $request->get('receiptTypeNo');



        //todo moid값이 정확히 오는것을 확인하기 위하여 order_where 에 대한 체크를 구성 안함.

        try{
            $encryptor = new Encryptor($this->merchantKey, $ediDate);
            $decAmt = $encryptor->decData($amt); //실제 결제금액
            $decMoid = $encryptor->decData($moid); // 결제시 등록된 주문번호
        }catch (\Exception $e){
            $decAmt = null;
            $decMoid = null;

        }



        //등록된 정보 가져오기
        $order_where = Order::find($decMoid);
        if($order_where){
            $order_price = $order_where->item->price;
            $purchase_id = $order_where->purchase_id;


        }

        if( $decAmt != $order_price || $decMoid != $order_where->id ){
            $result = "error";
        }else{

            $payment = Payment::where('orders_id', $order_where->id)->first();

            if(!$payment){
                $payment = new Payment();
                //결제정보 등록
                $payment->payMethod = $payMethod;
                $payment->transType = $transType;
                $payment->goodsName = $goodsName;
                $payment->amt = $decAmt;
                $payment->moid = $moid;
                $payment->mallUserId = $mallUserId;
                $payment->buyerName = $buyerName;
                $payment->buyerTel = $buyerTel;
                $payment->buyerEmail = $buyerEmail;
                $payment->rcvrMsg = $rcvrMsg;
                $payment->ediDate = $ediDate;
                $payment->encryptData = $encryptData;
                $payment->quotaFixed = $quotaFixed;
                $payment->supplyAmt = $supplyAmt;
                $payment->vat = $vat;
                $payment->billReqType = $billReqType;
                $payment->tid = $tid;
                $payment->stateCd = $stateCd;
                $payment->authDate = $authDate;
                $payment->authCode = $authCode;
                $payment->fnCd = $fnCd;
                $payment->fnName = $fnName;
                $payment->resultCd = $resultCd;
                $payment->resultMsg = $resultMsg;
                $payment->cardQuota = $cardQuota;
                $payment->cardNo = $cardNo;
                $payment->cardPoint = $cardPoint;
                $payment->usePoint = $usePoint;
                $payment->balancePoint = $balancePoint;
                $payment->BID = $BID;
                $payment->cashReceiptType = $cashReceiptType;
                $payment->receiptTypeNo = $receiptTypeNo;
                $payment->cashNo = $cashNo;
                $payment->cashTid = $cashTid;
                $payment->mid = $mid;
                $payment->errorCd = $errorCd;
                $payment->errorMsg = $errorMsg;
                $payment->orders_id = $order_where->id;

                $payment->save();
            }

            if($order_where->status_cd != 102){
                $order_where->status_cd = 102;
                $order_where->save();
            }

            //결제결과 purchase update
            $purchase = Purchase::find($purchase_id);
            if($purchase){

                if($purchase->status_cd != 102){
                    $purchase->status_cd = 102;
                    $purchase->amount =$decAmt;


                    if($payMethod == 'CARD'){
                        $purchase->type = 11;
                    }elseif ($payMethod == 'BANK'){
                        $purchase->type= 12;

                        $purchase->refund_name = $buyerName;
                        $purchase->refund_bank = $fnName;
                        $purchase->refund_account = $vbankNum;//Tpay에서는 별도로 해당 코드가 없는것으로 보임. 실계좌 연결 시 테스트 필요함.
                    }

                    $purchase->save();
                }

            }


            //결제결과 수신 여부 알림

            $url = 'https://webtx.tpay.co.kr/resultConfirm';

            if($tid){
                $client = new Client();
                $contents = $client->post($url, [
                    'form_params' => [
                        "tid" => $tid,
                        "result" => "000"
                    ]
                ]);
            }
        }

        return \GuzzleHttp\json_encode(['result' => 'ok']);
    }
    
    public function complete(Request $request) {
        $order = Order::where('datekey', $request->get('datekey'))
            ->where('cars_id', $request->get('cars_id'))->first();

        if($order){
            $item = Item::find($request->get('item_choice'))->first();

            $order->purchase->update([
                'amount' => $item->price,
                'type' => $request->get('payment_method'),
                'status_cd' => 102
            ]);

            $date = Carbon::now()->toDateTimeString();

            $reservation = Reservation::where('orders_id', $order->id)->first();
            if(!$reservation){
                $reservation = new Reservation();
            }
            $reservation->orders_id = $order->id;
            $reservation->garage_id = $order->garage_id;
            $reservation->created_id = $order->orderer_id;
            $reservation->reservation_at = $date;
            $reservation->save();


            //주문정보 갱신함.
            $order->status_cd = 103;
            $order->purchase_id = $order->purchase->id;
            $order->item_id = $item->id;
            $order->save();

            $error = null;

        }else{
            $order = new Order();
            $error = "잘못된 접근 또는 결제가 정상 처리되지 못하였습니다.\n관리자에게 문의해 주세요.";
        }
        return view('web.order.complete', compact('order', 'error'));

    }

    public function getModels(Request $request) {
        $brand_id = $request->get('brand');
        $models = Models::where('brands_id', $brand_id)->get();
        return $models;
    }

    public function getDetails(Request $request) {
        $model_id = $request->get('model');
        $details = Detail::where('models_id', $model_id)->get();
        return $details;
    }

    public function getGrades(Request $request) {
        $detail_id = $request->get('detail');
        $grades = Grade::where('details_id', $detail_id)->get();
        return $grades;
    }

    public function selItem(Request $request) {
        $item = Item::find($request->get('sel_item'));
        return $item;
    }

    public function getSection(Request $request) {
        $garage_sections = GarageInfo::where('area',$request->get('garage_area'))->GroupBy('section');
        if($garage_sections){
            $json = $garage_sections->get()->toArray();
        }else{
            $json = [];
        }
        return \GuzzleHttp\json_encode($json);
    }

    public function getAddress(Request $request) {
        $selected_garage =  GarageInfo::where('area', $request->get('sel_area'));
        if($request->get('sel_section')){
            $selected_garage->where('section', $request->get('sel_section'));
        }

        if($selected_garage){
            $selected_garage_list = $selected_garage->get()->toArray();

            foreach ($selected_garage->get() as $key => $garage){
                if($garage->user) {
                    $user_info = $garage->user->toArray();
                    $selected_garage_list[$key]['user_info'] = $user_info;
                }
            }
        }else{
            $selected_garage_list = [];
        }


        return \GuzzleHttp\json_encode($selected_garage_list, true);
    }



    ////////////////////////
    public function verification(Request $request) {

    }

    public function factory() {

    }

    public function process() {

    }

    /**
     * SMS 전송 메소드
     * @param Request $request
     */
    public function sendSms(Request $request){
        $validate = Validator::make($request->all(), [
            'mobile_num' => 'required',
        ]);

        $result = [
            'result' => '', 'id' => '', 'error' => '', 'error_msg' => ''
        ];

        if ($validate->fails())
        {
            $result['result'] = 'FAIL';
            $result['error'] = '000';
        }else{
            $rand_num = rand(100000, 999999);
            $data = [
                'mobile_num' => $request->get('mobile_num'), 'comfirm_msg' => $rand_num,

            ];

            $tr_phone = $request->get('mobile_num');
            $tr_callback = "1833-6889";
            $tr_msg = "카검사 주문신청 인증번호: ".$rand_num;
            $tr_sendstat = 0;
            $tr_msgtype = 0;

            try{
                $sms_model = new \App\Models\ScTran();
                $sms_model->send($tr_phone, $tr_callback, $tr_msg, $tr_sendstat, $tr_msgtype);
            }catch (\Exception $e){
                $result['result'] = 'FAIL';
                $result['error'] = '001';
                $result['error_msg'] = $e->getMessage();
            }

            $data['send_time'] = time();
            try{
                $sms_chk_model = new SmsTemp();
                $sms_chk_model->mobile_num = $request->get('mobile_num');
                $sms_chk_model->confirm_msg = $rand_num;
                $sms_chk_model->send_time = time();
                $sms_chk_model->save();

                $result['result'] = 'OK';
                $result['id'] = $sms_chk_model->id;
            }catch (\Exception $e){
                $result['result'] = 'FAIL';
                $result['error'] = '002';
                $result['error_msg'] = $e->getMessage();
            }



        }
        return \GuzzleHttp\json_encode($result);
    }

    /**
     * SMS 코드 검증 메소드
     * @param Request $request
     */
    public function isSms(Request $request){

        $result = [
            'result' => '', 'id' => '', 'error' => ''
        ];

        $validate = Validator::make($request->all(), [
            'sms_num' => 'required', 'sms_id' => 'required'
        ]);
        if ($validate->fails())
        {
            $result['result'] = 'FAIL';
            $result['error'] = '000';
        }else{
            $current_tieme = time();

            $sms_model = SmsTemp::findOrFail($request->get('sms_id'));
            if($sms_model){
                $div_num = $current_tieme - $sms_model->send_time;
                if($div_num <= 300){
                    //전송후 5분이내

                    if($request->get('sms_num') == $sms_model->confirm_msg){
                        $result['result'] = 'OK';
                        $result['id'] = $sms_model->id;
                    }else{ //등록된 인증번호와 사용자가 입력한 인증번호가 틀림
                        $result['result'] = 'FAIL';
                        $result['error'] = '020';
                    }

                }else{ //300초 이후 인증번호 입력
                    $result['result'] = 'FAIL';
                    $result['error'] = '011';
                }
            }else{ //해당 인증 record가 없음.
                $result['result'] = 'FAIL';
                $result['error'] = '010';
            }
        }
        return \GuzzleHttp\json_encode($result);
    }

    /**
     * SMS 임시코드 삭제 메소드
     * @param Request $request
     */
    public function deleteSms(Request $request){
        $result = [
            'result' => '', 'id' => '', 'error' => ''
        ];

        $validate = Validator::make($request->all(), [
            'sms_id' => 'required'
        ]);
        if ($validate->fails()) {
            $result['result'] = 'FAIL';
            $result['error'] = '000';
        }else{
            $sms_model = SmsTemp::find($request->get('sms_id'));
            if($sms_model){
                $sms_model->delete();
                $result['result'] = 'OK';
            }else{//해당 인증 record가 없음.
                $result['result'] = 'FAIL';
                $result['error'] = '010';
            }
        }

        return \GuzzleHttp\json_encode($result);
    }



}

