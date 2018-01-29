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

use App\Repositories\DiagnosisRepository;

class Order Extends Model
{
    protected $fillable = [
        'id',
        'chakey',               //주문번호
        'car_numbers_id',   //차번호 테이블 id
        'group_id', //주문 그룹키
        'purchase_id',  //구매 테이블 id
        'orderer_id',   //주문자 id
        'orderer_name', //주문자 이름
        'orderer_mobile',   //주문자 휴대폰번호
        'refund_status',    //환불완료여부
        'status_cd',    //상태 코드
        'flooding_state_cd',    //침수여부
        'accident_state_cd',     //사고여부
        'car_sort_cd',
        'type_cd'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];


    public function orderer()
    {
        return $this->hasOne(User::class, 'id', 'orderer_id');
    }

    public function purchase()
    {
        return $this->hasOne(\App\Models\Purchase::class, 'id', 'purchase_id');
    }

    public function status()
    {
        return $this->hasOne(\App\Models\Code::class, 'id', 'status_cd');
    }


    //주문아이템 조회
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class, 'orders_id', 'id');
        // return $this->hasOne(OrderItem::class, 'orders_id', 'id');
    }

    //그룹으로 주문아이템 조회
    public function orderGroup()
    {
        return $this->hasMany(Order::class, 'group_id', 'group_id')->where("id", "!=", $this->id);
    }


    // 주문번호 생성
    public function createChakey($car_number)
    {

        $seed = [];

        $seed[] = date("ymdH");        // 시간포함 8자리

        $seed[] = sprintf('%06d',mt_rand(0,999999)); // 숫자 6자리

        $n = substr($car_number, -4);   // 차량번호 4자리

        if (is_numeric($n)) {
            $seed[] = $n;
        } else {
            $seed[] = sprintf('%04d', rand(0001, 9999));
        }

        return implode("-", $seed);     // 하이픈 포한 총 20자리
    }

    // 진단주문 여부
    public function isDiagnosis(){
        $order_items = $this->OrderItem;

        foreach ($order_items as $order_item){
            if($order_item->type_cd == 121){
                return true;
            }
        }

        return false;
    }


    public function carNumber()
    {
        return $this->hasOne(CarNumber::class, 'id', 'car_numbers_id');
    }

    // 인증서 발급여부
    public function isIssued()
    {
        return $this->status_cd == 109;
    }

    // 결재정보
    public function payment()
    {
        return $this->hasOne(\App\Models\Payment::class, 'moid', 'id');
    }


}
