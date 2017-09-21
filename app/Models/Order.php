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
                return $this->hasMany(DiagnosisDetails::class,'orders_id', 'id');
        }

        public function order_features(){
                return $this->hasMany(OrderFeature::class,'orders_id', 'id');
        }


        // 해당 주문의 차량 풀네임을 조회
        public function getCarFullName() {

            $full_string = "";

            $car = null;

                if($this->status_cd == 109)
                {
                    if(isset($this->car)){
                        $car = $this->car;
                    }

                }else{
                    if(isset($this->orderCar)) {
                        $car = $this->orderCar;
                    }
                }

                if($car){
                    return implode(" ", [
                        $car->brand->name,
                        $car->models->name,
                        $car->detail->name,
                        $car->grade->name
                    ]);
                }else{
                    return "차량 정보가 없습니다.";
                }

        }

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
        public function technician(){
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



        //========================== 정산관련
        public function settlement_features(){
                return $this->hasMany(\App\Models\SettlementFeature::class, 'orders_id', 'id');
        }

        // PG 수수료
        public function getSettlementPGCommission() {
                return $this->purchase->amount * $this->item->commission;
        }

        // 기본 수익
        public function getSettlementDefaultIncome() {
                return ($this->purchase->amount * $this->item->commission) - $this->item->guarantee - $this->item->wage;
        }

        // 얼라이언스 수익
        public function getSettlementAllianceCommission() {
                return $this->getSettlementDefaultIncome() * $this->item->commission;
        }

        // 기술사 수익
        public function getSettlementTechCommission() {
                return $this->getSettlementDefaultIncome() * $this->item->commission;
        }

        // 회사수익
        public function getSettlementIncome() {
                return $this->getSettlementDefaultIncome() * $this->item->commission;
        }


        //========================== 아래는 검증안된 메쏘드
        public function order_feature(){
                return $this->hasMany(OrderFeature::class);
        }


        public function getReservationDate($order_id) {
                $reservation = Reservation::whereNotNull("updated_at")->where('orders_id', $order_id)->last();
                return ($reservation ? $reservation->reservation_at : null);
        }




        public function payment(){
                return $this->hasOne(\App\Models\Payment::class, 'moid', 'id');
        }


}
