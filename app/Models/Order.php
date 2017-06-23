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

class Order Extends Model
{
    protected $fillable = [
        'id',
        'datekey',
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
        'registration_file_cd',
        'mileage',
        'open_cd',
        'verification_id',
        'status_cd',
    ];
    protected $dates = [
        'created_at', 'updated_at','diagnose_at', 'diagnosed_at'
    ];












    public function details(){
        return $this->hasMany(DiagnosisDetails::class,'orders_id', '');
    }



    // 해당 주문의 차량 풀네임을 조회
    public function getCarFullName() {

        $fullname = array();

        if($this->car->brand) {
            $fullname[] = $this->car->brand->name;
        }
        if($this->car->models) {
            $fullname[] = $this->car->models->name;
        }
        if($this->car->detail) {
            $fullname[] = $this->car->detail->name;
        }
        if($this->car->grade) {
            $fullname[] = $this->car->grade->name;
        }

        return implode(" ", $fullname);
    }

    public function getReservation($order_id) {
        return Reservation::whereNotNull("updated_at")->where('orders_id', $order_id)->first();
    }

    public function getOrderNumber() {
        return $this->datekey . '-' . $this->car_number;
    }

    public function status() {
        return $this->hasOne(\App\Models\Code::class, 'id', 'status_cd');
    }

    public function diagnosis_details(){
        return $this->hasMany(\App\Models\DiagnosisDetails::class, 'orders_id', 'id');
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
        return $this->hasMany(\App\Models\Reservation::class, 'orders_id','id');
    }

    public function getReservationDate($order_id) {
        $reservation = Reservation::whereNotNull("updated_at")->where('orders_id', $order_id)->last();
        return ($reservation ? $reservation->reservation_at : null);
    }

    public function order_feature(){
        return $this->hasMany(OrderFeature::class);
    }


}
