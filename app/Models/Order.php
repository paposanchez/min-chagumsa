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

class Order Extends Model
{
    protected $fillable = [
        'car_number',   //차량번호
        'car_numbers_id',   //차번호 테이블 id
        'group_id', //주문 그룹키
        'purchase_id',  //구매 테이블 id
        'orderer_id',   //주문자 id
        'orderer_name', //주문자 이름
        'orderer_mobile',   //주문자 휴대폰번호
        'orderer_email',    //주문대상자 이메일
        'refund_status',    //환불완료여부
        'status_cd',    //상태 코드
        'car_number',
        'brands_id',
        'models_id',
        'details_id',
        'grades_id',
        'chakey'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function status()
    {
        return $this->hasOne(Code::class, 'id', 'status_cd');
    }

    public function orderer()
    {
        return $this->hasOne(User::class, 'id', 'orderer_id');
    }

    public function carNumber()
    {
        return $this->hasOne(CarNumber::class, 'id', 'car_numbers_id');
    }

    // 결재정보
    public function purchase()
    {
        return $this->hasOne(Purchase::class, 'id', 'purchase_id');
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

    //그룹으로 주문 조회
    public function getGroupOrder()
    {
        return $this->hasMany(Order::class, 'group', 'id');
    }

    //그룹으로 주문아이템 조회
    public function getGroupOrderItem()
    {
        return $this->hasMany(OrderItem::class, 'id', 'orders_id');
    }

    public function getParentOrder()
    {
        return $this->hasOne(Order::class, 'id', 'group_id');
    }

    public function diagnosis(){
        return $this->hasOne(Diagnosis::class, 'chakey', 'chakey');
    }

    public function certificate(){
        return $this->hasOne(Certificate::class, 'chakey', 'chakey');
    }

    public function warranty(){
        return $this->hasOne(Warranty::class, 'chakey', 'chakey');
    }

    // 주문번호 생성
    public function createChakey($car_number)
    {

        $seed = [];

        $seed[] = date("ymdH");                         // 시간포함 8자리

        $seed[] = sprintf('%06d', mt_rand(0, 999999));    // 숫자 6자리

        $n = substr($car_number, -4);                   // 차량번호 4자리

        if (is_numeric($n)) {
            $seed[] = $n;
        } else {
            $seed[] = sprintf('%04d', rand(0001, 9999));
        }

        return implode("-", $seed);     // 하이픈 포한 총 20자리
    }

    /**
     * 브랜드 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne(\App\Models\Brand::class, 'id', 'brands_id');
    }

    /**
     * 모델 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function models()
    {
        return $this->hasOne(\App\Models\Models::class, 'id', 'models_id');
    }

    /**
     * 디테일 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail()
    {
        return $this->hasOne(\App\Models\Detail::class, 'id', 'details_id');
    }

    /**
     * 세부 디테일 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grade()
    {
        return $this->hasOne(\App\Models\Grade::class, 'id', 'grades_id');
    }
    // 해당 주문의 차량 풀네임을 조회
    public function getCarFullName()
    {
        return implode(" ", [
            $this->brand->name,
            //                        $this->car->models->name,
            $this->detail->name,
            $this->grade->name
        ]);
    }

    // 진단주문 여부
    // public function isDiagnosis()
    // {
    //         $order_items = $this->OrderItem;
    //
    //         foreach ($order_items as $order_item) {
    //                 if ($order_item->type_cd == 121) {
    //                         return true;
    //                 }
    //         }
    //
    //         return false;
    // }


    // 인증서 발급여부
    // public function isIssued()
    // {
    //         return $this->status_cd == 109;
    // }

}
