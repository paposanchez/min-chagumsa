<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:52
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use GuzzleHttp;
use GuzzleHttp\Client;


class PaymentCancel Extends Model
{
    protected $fillable = [
        'id',
        'payMethod',
        'ediDate',
        'returnUrl',
        'resultMsg',
        'cancelDate',
        'cancelTime',
        'resultCd',
        'cancelNum',
        'cancelAmt',
        'moid',
        'orders_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];



    public function order(){
        return $this->belongsTo(Order::class, 'orders_id', 'id');
    }

    protected $merchantKey = "VXFVMIZGqUJx29I/k52vMM8XG4hizkNfiapAkHHFxq0RwFzPit55D3J3sAeFSrLuOnLNVCIsXXkcBfYK1wv8kQ==";//상점키
    protected $mid = "tpaytest0m";//상점id
    protected $cancel_passwd = "123456"; //취소 시 사용되는 패스워드(Tpay 계정 설정 참조)
    protected $paycancel_url = "https://webtx.tpay.co.kr/api/v1/refunds";

    /**
     * @param $order_id 주문번호
     * @param $order_price 결제취소금액
     * @param $tid 거래TID
     * @param int $partial 부분취소여부(전체:0, 부분:1)
     * @param string $cancel_msg 결제취소 메세지
     * @return array
     */
    public function paymentCancelProcess($order_id, $order_price, $tid, $partial=0, $cancel_msg='고객요청'){
        try{
            $send_data = [
                "form_params" => [

                    'mid' => $this->mid,
                    'api_key' => $this->api_key,
                    'moid' => $order_id,
                    'cancel_pw' => $this->cancel_passwd,
                    'cancel_amt' => $order_price,
                    'partial_cancel' => 0,
                    'cancel_msg' => '고객요청',
                    'tid' => $tid
                ]
            ];

            $pay_cancel = new Client();
            $cancel_request = $pay_cancel->post($this->paycancel_url, $send_data);
            $cancel_result = \GuzzleHttp\json_decode($cancel_request->getBody());

            return $cancel_result;
        }catch (\Exception $e){
            return [];
        }

    }

}
