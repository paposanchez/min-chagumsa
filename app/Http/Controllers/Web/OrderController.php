<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Code;
use App\Models\Detail;
use App\Models\Grade;
use App\Models\Item;
use App\Models\Models;
use App\Models\Order;
use App\Models\OrderCar;
use App\Models\OrderFeature;
use App\Models\Purchase;
use App\Models\Reservation;
use App\Models\User;
use App\Models\UserExtra;
use Carbon\Carbon;
use App\Models\SmsTemp;
use App\Models\Payment;
use App\Models\PaymentResult;
use App\Models\Coupon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Tpay\TpayLib as Encryptor;
use GuzzleHttp\Client;
use App\Events\SendSms;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    protected $merchantKey;//상점키
    protected $mid;//상점id

    /**
     * OrderController constructor.
     */
    public function __construct()
    {
        $this->merchantKey = env('PG_KEY');
        $this->mid = env('PG_ID');
    }

    /**
     * @param Request $request
     * 주문 신청 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', '로그인이 필요한 서비스입니다.');
        }

        if ($user->status_cd != 1) {
            return redirect('/mypage/profile')->with('error', "현재 계정이 비활성화 상태입니댜. <br>계정이 활성화되어야 주문신청이 가능합니다.");
        }

        $brands = Brand::select('id', 'name')
            ->orderByRaw('CASE WHEN id = 5 THEN 8 WHEN id = 6 THEN 9 WHEN id = 4 OR id = 19 OR id = 38 OR id = 74 OR id = 44 THEN 5 WHEN id = 1 OR id = 28 OR id = 45 THEN 1 ELSE 3 END ASC, name ASC')
            ->get();
        $exterior_option = Code::where('group', 'car_option_exterior')->get();
        $interior_option = Code::where('group', 'car_option_interior')->get();
        $safety_option = Code::where('group', 'car_option_safety')->get();
        $facilities_option = Code::where('group', 'car_option_facilities')->get();
        $multimedia_option = Code::where('group', 'car_option_multimedia')->get();

        $items = Item::where("id", ">", "0")->get();

        $search_fields = [
            '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시', '15' => '15시', '16' => '16시', '17' => '17시'
        ];

        $garages = UserExtra::whereNotIn('users_id', [4])
            ->join('users', function ($join) {
                $join->on('user_extras.users_id', 'users.id')
                    ->where('users.status_cd', 1);
            })
            ->orderBy(DB::raw('field(area, "서울시")'), 'desc')->orderBy('area', 'asc')->groupBy('area')->whereNotNull('aliance_id')->whereNotNull('area')->get();


        return view('web.order.index', compact('items', 'garages', 'brands', 'exterior_option', 'interior_option', 'safety_option', 'facilities_option', 'multimedia_option', 'user', 'search_fields'));
    }

    /**
     * 결제 팝업
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentPopup(Request $request)
    {
        $orderer = Auth::user();

        $garage_info = UserExtra::where('users_id', $request->get('garages'))->first();

        if (!$garage_info) {
            $garage_info = new UserExtra();
        }

        $order = new Order();
        $order->car_number = $request->get('car_number');
        $order->garage_id = $garage_info->users_id;
        $order->orderer_id = $orderer->id;
        $order->orderer_name = $request->get('orderer_name');
        $order->orderer_mobile = $request->get('mobile');
        $order->registration_file = 0;
        $order->open_cd = 1327; //default로 비공개코드 삽입 1326 인증서 공개 1327 인증서 비공개
        $order->status_cd = 101;

        if ($request->get('flooding')) {
            $order->flooding_state_cd = 1;
        } else {
            $order->flooding_state_cd = 0;
        }

        if ($request->get('accident')) {
            $order->accident_state_cd = 1;
        } else {
            $order->accident_state_cd = 0;
        }

        $order->item_id = $request->get('item_id');

        $purchase = new Purchase();
        $purchase->amount = $request->get('payment_price'); //결제 완료 후 update
        $purchase->type = $request->get('payment_method'); // 결제방법
        $purchase->status_cd = 101; // 결제상태
        $purchase->save();

        $order->purchase_id = $purchase->id;
        $order->save();


        // order_car 의 orders_id 입력
        $order_car = new OrderCar();
        $order_car->orders_id = $order->id;
        $order_car->brands_id = $request->get('brands');
        $order_car->models_id = $request->get('models');
        $order_car->details_id = $request->get('details');
        $order_car->grades_id = $request->get('grades');
        $order_car->save();


        // 예약 관련
        $reservation_date = new \DateTime($request->get('reservation_date') . ' ' . $request->get('sel_time') . ':00:00');

        $reservation = Reservation::where('orders_id', $order->id)->first();
        if (!$reservation) {
            $reservation = new Reservation();
        }
        $reservation->orders_id = $order->id;
        $reservation->garage_id = $garage_info->users_id;
        $reservation->created_id = $order->orderer_id;
        $reservation->reservation_at = $reservation_date->format('Y-m-d H:i:s');
        $reservation->save();


        if ($request->get('options_ck') != []) {
            $order_features = OrderFeature::where('orders_id', $order->id)->first();
            if (!$order_features) {
                $order_features = new OrderFeature();
            } else {
                OrderFeature::where('orders_id', $order->id)->delete();
            }
            $order_features_list = [];
            foreach ($request->get('options_ck') as $key => $options) {
                $order_features_list[$key]['orders_id'] = $order->id;
                $order_features_list[$key]['features_id'] = $options;
            }
            $order_features->insert($order_features_list);
            $order_features->save();
        }

        // payment_method 11 - 신용카드, 12 - 실시간 계좌이체
        if (!in_array($request->get('payment_method'), [11, 12])) {
            $error = true;
        } else {
            if ($request->get('payment_method') == 11) {
                $payMethod = 'CARD';
            } elseif ($request->get('payment_method') == 12) {
                $payMethod = 'BANK';
            } else {
                $error = true;
                //결제 방식이 카드,체크카드,실시간계좌이체 이외에는 error임.
            }
        }


        //결제금액을 구함.
        if ($request->get('payment_price')) {
            $amt = $request->get('payment_price');//결제금액
        } else {
            $error = false;
        }

        $moid = $order->id;
        //$ediDate, $mid, $merchantKey, $amt
        $encryptor = new Encryptor($this->merchantKey);
        $encryptData = $encryptor->encData($amt . $this->mid . $moid);
        $ediDate = $encryptor->getEdiDate();

        $vbankExpDate = $encryptor->getVBankExpDate();
        $payActionUrl = "https://webtx.tpay.co.kr";
        $payLocalUrl = url('/');   //각 상점 도메인을 설정 하세요.  ex)http://shop.tpay.co.kr
        $buyerName = $request->get('orderer_name');
        $buyerEmail = $orderer->email;
        $buyerTel = $request->get('orderer_mobile');
        $product_name = $order->item->name;
        $mid = $this->mid;
        $merchantKey = $this->merchantKey;

        return view('web.order.payment-popup', compact('request', 'mid', 'merchantKey', 'amt', 'moid', 'encryptData',
                'ediDate', 'vbankExpDate', 'payActionUrl', 'payLocalUrl', 'payMethod', 'amt', 'buyerName', 'buyerEmail',
                'buyerTel', 'product_name', 'error')
        );
    }

    /**
     * 결제완료 저장 메소드
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentResult(Request $request)
    {
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


        try {
            $encryptor = new Encryptor($this->merchantKey, $ediDate);
            $decAmt = $encryptor->decData($amt); //실제 결제금액
            $decMoid = $encryptor->decData($moid); // 결제시 등록된 주문번호
        } catch (\Exception $e) {
            $decAmt = null;
            $decMoid = null;
            $event = false; //결제확인이 완료되지 않음
        }

        //등록된 정보 가져오기
        $order_where = Order::find($decMoid);
        if ($order_where) {
            $purchase_id = $order_where->purchase_id;
        } else {
            $order_where = new Order();
            $purchase_id = false;
        }


        if ($decMoid != $order_where->id) {
            $result = "결제처리 진행 중입니다.";
            $event = true; //결제완료
        } else {


            //결제결과 purchase update
            $purchase = Purchase::find($purchase_id);
            $purchase->status_cd = 102;
            $purchase->amount = $decAmt;


            if ($payMethod == 'CARD') {
                $purchase->type = 11;
            } elseif ($payMethod == 'BANK') {
                $purchase->type = 12;

                $purchase->refund_name = $buyerName;
                $purchase->refund_bank = $fnName;
                $purchase->refund_account = $vbankNum;//Tpay에서는 별도로 해당 코드가 없는것으로 보임. 실계좌 연결 시 테스트 필요함.
            }

            $purchase->save();

            //order 결제상태 변경
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

            if ($tid) {
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

            //문자, 메일 송부하기
            $enter_date = $order_where->created_at;
            $garage_info = User::find($order_where->garage_id);
            $garage_extra = UserExtra::find($garage_info->id);

            $ceo_mobile = $garage_extra->ceo_mobile;
            $garage = $garage_info->name;
            $price = $decAmt;
            try {
                //메일전송

                $mail_message = [
                    'enter_date' => $enter_date, 'garage' => $garage, 'price' => $price
                ];
//                $emails = [Auth::user()->email, 'cs@jimbros.co.kr'];

                Mail::send(new \App\Mail\Ordering('cs@jimbros.co.kr', Auth::user()->name."님의 주문 신청이 완료되었습니다.", $mail_message, 'message.email.ordering-user'));
                Mail::send(new \App\Mail\Ordering(Auth::user()->email, "차검사 주문 신청이 완료되었습니다.", $mail_message, 'message.email.ordering-user'));

            } catch (\Exception $e) {
            }

            try {
                // SMS전송
                //사용자
                $user_message = view('message.sms.ordering-user', compact('enter_date', 'garage', 'price'))->render();
                event(new SendSms($order_where->orderer_mobile, '', $user_message));

                //BCS
                $orderer_name = Auth::user()->name;
                $order_num = $order_where->getOrderNumber();
                $bcs_message = view('message.sms.ordering-bcs', compact('orderer_name', 'order_num'));
                event(new SendSms($ceo_mobile, '', $bcs_message));

            } catch (\Exception $e) {
            }
            //발송 끝


            $result = "결제가 완료 되었습니다";
            $event = true; //결제완료
        }
        return view('web.order.payment-result', compact('result', 'event', 'decMoid'));
    }

    /**
     * 결제 callback action. purchase에서 처리 에러가 발생시 콜백을 통하여 처리 가능함.
     * @param Request $request
     * @return string
     */
    public function payResult(Request $request)
    {

        $payMethod = $request->get('payMethod');//
        $mid = $request->get('mid');//
        $tid = $request->get('tid');//
        $mallUserId = $request->get('mallUserId');//
        $amt = $request->get('amt');//
        $buyerName = $request->get('buyerName');//
        $buyerTel = $request->get('buyerTel');//
        $buyerEmail = $request->get('buyerEmail');//
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

        try {
            $encryptor = new Encryptor($this->merchantKey, $ediDate);
            $decAmt = $encryptor->decData($amt); //실제 결제금액
            $decMoid = $encryptor->decData($moid); // 결제시 등록된 주문번호
        } catch (\Exception $e) {
            $decAmt = null;
            $decMoid = null;

        }


        //등록된 정보 가져오기
        $order_where = Order::find($decMoid);
        if ($order_where) {
            $order_price = $order_where->item->price;
            $purchase_id = $order_where->purchase_id;


        }

        if ($decAmt != $order_price || $decMoid != $order_where->id) {
            $result = "error";
        } else {

            $payment = Payment::where('orders_id', $order_where->id)->first();

            if (!$payment) {
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

            if ($order_where->status_cd != 102) {
                $order_where->status_cd = 102;
                $order_where->save();
            }

            //결제결과 purchase update
            $purchase = Purchase::find($purchase_id);
            if ($purchase) {

                if ($purchase->status_cd != 102) {
                    $purchase->status_cd = 102;
                    $purchase->amount = $decAmt;


                    if ($payMethod == 'CARD') {
                        $purchase->type = 11;
                    } elseif ($payMethod == 'BANK') {
                        $purchase->type = 12;

                        $purchase->refund_name = $buyerName;
                        $purchase->refund_bank = $fnName;
                        $purchase->refund_account = $vbankNum;//Tpay에서는 별도로 해당 코드가 없는것으로 보임. 실계좌 연결 시 테스트 필요함.
                    }

                    $purchase->save();
                }

            }


            //결제결과 수신 여부 알림

            $url = 'https://webtx.tpay.co.kr/resultConfirm';

            if ($tid) {
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

    /**
     * 주문완료 페이지
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function complete(Request $request)
    {
        $order = Order::where('id', $request->get('orders_id'))->first();
        if (!$order) {
            return redirect("/order")->with("error", "잘못된 접근 또는 결제가 정상 처리되지 못하였습니다. 관리자에게 문의해 주세요.");
        }

        $is_coupon = $request->get('is_coupon');
        $coupon = Coupon::find($request->get('coupon_id'));
        if ($coupon) {
            $coupon_kind = $coupon->coupon_kind;
        } else {
            $coupon_kind = '쿠폰주문 상품입니다.';
        }

        //주문정보 갱신함.
        $reservation = $order->reservation;

        return view('web.order.complete', compact('order', 'reservation', 'is_coupon', 'coupon_kind'));
    }

    /**
     * 주문취소 콜백 메소드
     * @param Request $request
     * @return string
     */
    public function orderCancelCallback(Request $request)
    {

        $payMethod = $request->get('payMethod');
        $ediDate = $request->get('ediDate');
        $returnUrl = $request->get('returnUrl');
        $resultMsg = $request->get('resultMsg');
        $cancelDate = $request->get('cancelDate');
        $cancelTime = $request->get('cancelTime');
        $resultCd = $request->get('resultCd');
        $cancelNum = $request->get('cancelNum');
        $cancelAmt = $request->get('cancelAmt');
        $moid = $request->get('moid');

        //파라미터 연동을 위하여 내용을 우선 file에 저장함
        $params = $request->all();
        $param_str = implode(", ", array_map(
            function ($v, $k) {
                return sprintf("%s='%s'", $k, $v);
            },
            $params,
            array_keys($params)
        ));

        try {
            $encryptor = new Encryptor($this->merchantKey, $ediDate);
            $decAmt = $encryptor->decData($cancelAmt); //실제 결제 취소 금액
            $decMoid = $encryptor->decData($moid); // 결제시 등록된 주문번호
        } catch (\Exception $e) {
            $decAmt = null;
            $decMoid = null;

        }

        $order_where = Order::find($decMoid);
        if ($order_where) {
            $order_price = $order_where->item->price;
            if ($order_price == $cancelAmt) {
                //주문 취소 완료 해야함.
                $order_where->status_cd = 100;
                $order_where->save();
                $cancel_result = 1;
            } else {
                $cancel_result = 0;
            }

            //결제취소 내역을 저장한다.
            $payment_cancel = PaymentCancel::where('moid', $moid)->first();
            if (!$payment_cancel) {
                $payment_cancel = new PaymentCancel();
            }

            $payment_cancel->payMethod = $payMethod;
            $payment_cancel->ediDate = $ediDate;
            $payment_cancel->returnUrl = $returnUrl;
            $payment_cancel->resultMsg = $resultMsg;
            $payment_cancel->cancelDate = $cancelDate;
            $payment_cancel->cancelTime = $cancelTime;
            $payment_cancel->resultCd = $resultCd;
            $payment_cancel->cancelNum = $cancelNum;
            $payment_cancel->cancelAmt = $cancelAmt;
            $payment_cancel->moid = $moid;
            $payment_cancel->orders_id = $decMoid;
            $payment_cancel->save();


        } else {
            $cancel_result = -1;
        }

        return \GuzzleHttp\json_encode(['result' => $cancel_result]);

    }

    /**
     * 차량 모델 조회 메소드
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getModels(Request $request)
    {
        $brand_id = $request->get('brand');
        $models = Models::where('brands_id', $brand_id)->orderBy("name", 'ASC')->get();
        return $models;
    }

    /**
     * 차량 세부모델 조회 메소드
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getDetails(Request $request)
    {
        $model_id = $request->get('model');
        $details = Detail::where('models_id', $model_id)->orderBy("name", 'ASC')->get();
        return $details;
    }

    /**
     * 차량 등급 조회 메소드
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getGrades(Request $request)
    {
        $detail_id = $request->get('detail');
        $grades = Grade::where('details_id', $detail_id)->where('items_id', '>', '0')->get();
        return $grades;
    }

    /**
     * 아이템 getter
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function selItem(Request $request)
    {
        $item = Item::find($request->get('sel_item'));
        return $item;
    }

    /**
     * @param Request $request
     * 정비소 시/군 정보 리스트
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSection(Request $request)
    {
        $users = \App\Models\Role::find(4)->users;
        $sections = [];
        foreach ($users as $user) {
//            if ($user->status_cd != 2 && $user->user_extra->users_id != 4 && $user->user_extra->area == $request->get('garage_area')) {
            if ($user->status_cd != 2 && $user->user_extra->area == $request->get('garage_area')) {
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
//            if ($user->status_cd != 2 && $user->user_extra->users_id != 4 && $user->user_extra->area == $request->get('sel_area') && $user->user_extra->section == $request->get('sel_section')) {
            if ($user->status_cd != 2 && $user->user_extra->area == $request->get('sel_area') && $user->user_extra->section == $request->get('sel_section')) {
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
     * sms 전송 메소드
     * 핸드폰 인증번호를 전송한다.
     * todo 나중에 event로 태워야 할 것 같다     * @return string
     */
    public function sendSms(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'mobile_num' => 'required',
        ]);

        $result = [
            'result' => '', 'id' => '', 'error' => '', 'error_msg' => ''
        ];

        if ($validate->fails()) {
            $result['result'] = 'FAIL';
            $result['error'] = '000';
        } else {
            $rand_num = rand(100000, 999999);
            $data = [
                'mobile_num' => $request->get('mobile_num'), 'comfirm_msg' => $rand_num,

            ];

            $tr_phone = $request->get('mobile_num');
            $tr_callback = "1833-6889";
            $tr_msg = "차검사 주문신청 인증번호: " . $rand_num;
            $tr_sendstat = 0;
            $tr_msgtype = 0;

            try {
                $sms_model = new \App\Models\ScTran();
                $sms_model->send($tr_phone, $tr_callback, $tr_msg, $tr_sendstat, $tr_msgtype);
            } catch (\Exception $e) {
                $result['result'] = 'FAIL';
                $result['error'] = '001';
                $result['error_msg'] = $e->getMessage();
            }

            $data['send_time'] = time();
            try {
                $sms_chk_model = new SmsTemp();
                $sms_chk_model->mobile_num = $request->get('mobile_num');
                $sms_chk_model->confirm_msg = $rand_num;
                $sms_chk_model->send_time = time();
                $sms_chk_model->save();

                $result['result'] = 'OK';
                $result['id'] = $sms_chk_model->id;
            } catch (\Exception $e) {
                $result['result'] = 'FAIL';
                $result['error'] = '002';
                $result['error_msg'] = $e->getMessage();
            }


        }
        return \GuzzleHttp\json_encode($result);
    }

    /**
     * @param Request $request
     * SMS 코드 검증 메소드
     * @return string
     */
    public function isSms(Request $request)
    {

        $result = [
            'result' => '', 'id' => '', 'error' => ''
        ];

        $validate = Validator::make($request->all(), [
            'sms_num' => 'required', 'sms_id' => 'required'
        ]);
        if ($validate->fails()) {
            $result['result'] = 'FAIL';
            $result['error'] = '000';
        } else {
            $current_tieme = time();

            $sms_model = SmsTemp::findOrFail($request->get('sms_id'));
            if ($sms_model) {
                $div_num = $current_tieme - $sms_model->send_time;
                if ($div_num <= 300) {
                    //전송후 5분이내

                    if ($request->get('sms_num') == $sms_model->confirm_msg) {
                        $result['result'] = 'OK';
                        $result['id'] = $sms_model->id;
                    } else { //등록된 인증번호와 사용자가 입력한 인증번호가 틀림
                        $result['result'] = 'FAIL';
                        $result['error'] = '020';
                    }

                } else { //300초 이후 인증번호 입력
                    $result['result'] = 'FAIL';
                    $result['error'] = '011';
                }
            } else { //해당 인증 record가 없음.
                $result['result'] = 'FAIL';
                $result['error'] = '010';
            }
        }
        return \GuzzleHttp\json_encode($result);
    }

    /**
     * @param Request $request
     * SMS 임시코드 삭제 메소드
     * @return string
     */
    public function deleteSms(Request $request)
    {
        $result = [
            'result' => '', 'id' => '', 'error' => ''
        ];

        $validate = Validator::make($request->all(), [
            'mobile_num' => 'required'
        ]);
        if ($validate->fails()) {
            $result['result'] = 'FAIL';
            $result['error'] = '000';
        } else {
            $sms_model = SmsTemp::where('mobile_num', $request->get('mobile_num'));
            if ($sms_model) {
                $sms_model->delete();
                $result['result'] = 'OK';
            } else {//해당 인증 record가 없음.
                $result['result'] = 'FAIL';
                $result['error'] = '010';
            }
        }

        return \GuzzleHttp\json_encode($result);
    }


    /**
     * @param Request $request
     * 쿠폰 번호 검증 메소드
     * @return array
     */
    public function couponVerify(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'coupon_number' => 'required|min:10|max:20'
        ]);

        $result = [
            'status' => 'fail', 'msg' => '', 'id' => '', 'coupon_number' => ''
        ];

        if ($validate->fails()) {
            $result['msg'] = "필수파라미터가 누락되거나 쿠폰번호가 잘못 입력되었습니다.";
            return $result;
        }

        $where = Coupon::where('coupon_number', $request->get('coupon_number'))->first();
        if ($where) {
            if ($where->is_use == 1) {
                $result['msg'] = "해당 쿠폰번호는 등록완료된 쿠폰번호입니다.";

            } else {
                if (Auth::user()->id != $where->users_id && $where->users_id != 0) {
                    //쿠폰 인증 후 재입력시 사용자 계정이 바뀜
                    //쿠폰 임시 인증시에는 재인증 및 결제를 하더라도 임시처리가 되면 유저가 동일해야 한다.
                    $result['msg'] = '해당 쿠폰번호는 인증 진행 중인 쿠폰번호 입니다.';
                } else {
                    $where->is_use = 3; //임시 사용 번호로 변경함.
                    $where->users_id = Auth::user()->id;
                    $where->save();
                    $result['status'] = 'ok';
                    $result['msg'] = '쿠폰이 등록되었습니다.';
                    $result['id'] = $where->id;

                    //임시 쿠폰번호를 전달함.
                    $result['coupon_number'] = Crypt::encryptString($where->coupon_number);
                }

            }
        } else {
            $result['msg'] = "입력하신 쿠폰번호를 찾을 수 없습니다.";
        }
        return $result;
    }

    /**
     * @param Request $request
     * 쿠폰 번호 인증 처리
     * 쿠폰번호가 인증된다면, 주문을 생성한다.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function couponProcess(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'use_coupon_number' => 'required', 'coupon_id' => 'required|int'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', '쿠폰정보가 없습니다.');
        }

        //coup 사용 갱신
        $descript_coupon_number = Crypt::decryptString($request->get('use_coupon_number'));

        $coupon_where = Coupon::find($request->get('coupon_id'));
        if (!$coupon_where) {
            $coupon_where = Coupon::where('coupon_number', $descript_coupon_number)->first();
            if (!$coupon_where) {
                return redirect()->back()->with('erroe', '코폰번호 유효성 검증을 실패하였습니다');
            }
        }

        if ($coupon_where) {
            //쿠폰 작업
            $coupon_where->is_use = 1;
            $coupon_where->save();
        }

        $orderer = Auth::user();

        $garage_info = UserExtra::where('users_id', $request->get('garages'))->first();

        if (!$garage_info) {
            $garage_info = new UserExtra();
        }

        $order = new Order();

        $order->car_number = $request->get('car_number');
        $order->garage_id = $garage_info->users_id;
        $order->orderer_id = $orderer->id;
        $order->orderer_name = $request->get('orderer_name');
        $order->orderer_mobile = $request->get('mobile');
        $order->registration_file = 0;
        $order->open_cd = 1327; //default로 비공개코드 삽입 1326 인증서 공개 1327 인증서 비공개
        $order->status_cd = 102;

        if ($request->get('flooding')) {
            $order->flooding_state_cd = 1;
        } else {
            $order->flooding_state_cd = 0;
        }

        if ($request->get('accident')) {
            $order->accident_state_cd = 1;
        } else {
            $order->accident_state_cd = 0;
        }

        $order->item_id = $request->get('item_id');

        $purchase = new Purchase();
        $purchase->amount = 0; //결제 완료 후 update
        $purchase->type = $request->get('payment_method'); // 결제방법
        $purchase->status_cd = 102; // 결제상태
        $purchase->save();

        $order->purchase_id = $purchase->id;
        $order->save();

        // order_car 의 orders_id 입력
        $order_car = new OrderCar();
        $order_car->orders_id = $order->id;
        $order_car->brands_id = $request->get('brands');
        $order_car->models_id = $request->get('models');
        $order_car->details_id = $request->get('details');
        $order_car->grades_id = $request->get('grades');
        $order_car->save();

        // 예약 관련
        $reservation_date = new \DateTime($request->get('reservation_date') . ' ' . $request->get('sel_time') . ':00:00');

        $reservation = Reservation::where('orders_id', $order->id)->first();
        if (!$reservation) {
            $reservation = new Reservation();
        }
        $reservation->orders_id = $order->id;
        $reservation->garage_id = $garage_info->users_id;
        $reservation->created_id = $order->orderer_id;
        $reservation->reservation_at = $reservation_date->format('Y-m-d H:i:s');
        $reservation->save();

        if ($request->get('options_ck') != []) {
            $order_features = OrderFeature::where('orders_id', $order->id)->first();
            if (!$order_features) {
                $order_features = new OrderFeature();
            } else {
                OrderFeature::where('orders_id', $order->id)->delete();
            }
            $order_features_list = [];
            foreach ($request->get('options_ck') as $key => $options) {
                $order_features_list[$key]['orders_id'] = $order->id;
                $order_features_list[$key]['features_id'] = $options;
            }
            $order_features->insert($order_features_list);
            $order_features->save();
        }


        //메일 송부하기
        $enter_date = $order->created_at;
        $garage_info = User::find($order->garage_id);
        $garage = $garage_info->name;
        $user = Auth::user();

        try {
            //메일전송
            $mail_message = [
                'enter_date' => $enter_date, 'garage' => $garage, 'price' => $order->item->price
            ];

            $mail_message2 = [
                'user_name' => $user->name, 'enter_date' => $enter_date, 'reservation_date' => $order->reservation->reservation_at, 'price' => $order->item->price, 'type' => $order->purchase->payment_type->display(), 'garage' => $garage
            ];

            Mail::send(new \App\Mail\Ordering('cs@jimbros.co.kr', "[차검사 결제 완료] 주문자 : ".$user->name, $mail_message2, 'message.email.ordering-admin'));
            Mail::send(new \App\Mail\Ordering($user->email, "차검사 주문 신청이 완료되었습니다.", $mail_message, 'message.email.ordering-user'));

        } catch (\Exception $e) {
        }

        return redirect()->route('order.complete', [
            'orders_id' => $order->id, 'is_complete' => 1,
            'is_coupon' => 1, 'coupon_id' => $coupon_where->id
        ])->with('success', '주문이 완료되었습니다');
    }

    public function carValidation(Request $request){
        $car_number = $request->get('car_number');

        try{
            $order_date = Carbon::now()->format('ymd');
            $order = Order::where('car_number', $car_number)
                ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
                ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
                ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'))->get();

            if(count($order) > 0){
                return response()->json('fail');
            }else{
                return response()->json('success');
            }

        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }

    }

}
