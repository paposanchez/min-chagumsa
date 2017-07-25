<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentResult;

use App\Tpay\TpayLib as Encryptor;

class PaymentController extends Controller {



    /**
     * 결제완료 페이지
     * payReqRequest.php에 해당함
     */
    public function payResult() {
        return view('web.pay.result');
    }

    /**
     * 결제 retry callback 수신 페이지
     * 결제완료 수신이 정상적으로 이루어 지지 않을 경우 재처리하는 api 페이지이다.
     * 수신된 데이터와 insert 된 데이터를 비교하여 레코드가 있으면 비교 업데이트 또는 skip
     * 없다면 insert를 해준다.
     */
    public function payCallback() {
        return view('web.order.reservation');
    }
    


}

