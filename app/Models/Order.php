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

use App\Models\Certificate;
use App\Models\Car;
use App\Models\CarFeature;
use App\Models\Purchase;
use App\Models\SettlementFeature;
use App\Models\DiagnosisDetails;
use App\Models\Item;
use App\Models\Reservation;
use App\Models\Payment;

class Order Extends Model
{
    protected $fillable = [
        'id',
        'car_number',
        'cars_id',
        'garage_id',
        'item_id',
        'purchase_id',
        'engineer_id',
        'technist_id',
        'orderer_id',
        'orderer_name',
        'orderer_mobile',
        'registration_file',
        'mileage',
        'open_cd',
        'verification_id',
        'refund_status',
        'status_cd',
    ];
    protected $dates = [
        'created_at', 'updated_at','diagnose_at', 'diagnosed_at'
    ];


    public function details(){
        return $this->hasMany(DiagnosisDetails::class,'orders_id', '');
    }

    public function order_features(){
        return $this->hasMany(OrderFeature::class,'orders_id', 'id');
    }


    // 해당 주문의 차량 풀네임을 조회
    public function getCarFullName() {

        $fullname = array();

//        if(isset($this->car)){
//            if($this->car->brand) {
//                $fullname[] = $this->car->brand->name;
//            }
//            if($this->car->models) {
//                $fullname[] = $this->car->models->name;
//            }
//            if($this->car->detail) {
//                $fullname[] = $this->car->detail->name;
//            }
//            if($this->car->grade) {
//                $fullname[] = $this->car->grade->name;
//            }
//        }
        if(isset($this->orderCar)){
            if($this->orderCar->brand) {
                $fullname[] = $this->orderCar->brand->name;
            }
            if($this->orderCar->models) {
                $fullname[] = $this->orderCar->models->name;
            }
            if($this->orderCar->detail) {
                $fullname[] = $this->orderCar->detail->name;
            }
            if($this->orderCar->grade) {
                $fullname[] = $this->orderCar->grade->name;
            }
        }


        return implode(" ", $fullname);
    }


    // public function getReservation($order_id) {
    //     return Reservation::whereNotNull("updated_at")->where('orders_id', $order_id)->first();
    // }

    public function getOrderNumber() {
        return  $this->car_number . "-" . $this->created_at->format('ymd');
    }

    public function status() {
        return $this->hasOne(\App\Models\Code::class, 'id', 'status_cd');
    }


    public function certificates(){
        return $this->hasOne(Certificate::class, 'orders_id', 'id');
    }

    public function engineer(){
        return $this->hasOne(User::class, 'id', 'engineer_id');
    }
    public function technicion(){
        return $this->hasOne(User::class, 'id', 'technist_id');
    }

    public function item(){
        return $this->hasOne(\App\Models\Item::class, 'id','item_id');
    }

    public function purchase(){
        return $this->hasOne(\App\Models\Purchase::class, 'id','purchase_id');
    }

    public function car(){
        return $this->hasOne(\App\Models\Car::class, 'id','cars_id');
    }

    public function reservation(){
        return $this->hasOne(\App\Models\Reservation::class, 'orders_id','id');
    }

    public function garage(){
        return $this->hasOne(\App\Models\User::class, 'id','garage_id');
    }

    public function orderCar(){
        return $this->hasOne(OrderCar::class, 'orders_id','id');
    }




    //========================== 진단 수정중


    public function diagnoses(){
        return $this->hasMany(\App\Models\Diagnosis::class, 'orders_id', 'id');
    }



    // public function diagnosis_items(){
    //     return $this->hasMany(\App\Models\DiagnosisItems::class, 'orders_id', 'id');
    // }

    // public function diagnosis_details(){
    //     return $this->hasMany(\App\Models\DiagnosisDetails::class, 'orders_id', 'id');
    // }


    //========================== 아래는 검증안된 메쏘드


    public function order_feature(){
        return $this->hasMany(OrderFeature::class);
    }

//    public function status(){
//        $code = $this->hasOne(Code::class, 'id', 'status_cd');
//        return $code;
//
//    }


    public function settlement_features(){
        return $this->hasMany(\App\Models\SettlementFeature::class, 'orders_id', 'id');
    }

    public function getReservationDate($order_id) {
        $reservation = Reservation::whereNotNull("updated_at")->where('orders_id', $order_id)->last();
        return ($reservation ? $reservation->reservation_at : null);
    }

    public function payment(){
        return $this->hasOne(\App\Models\Payment::class, 'moid', 'id');
    }
}
