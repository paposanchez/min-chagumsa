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

use App\Repositories\DiagnosisRepository;

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
                return implode(" ", [
                        $this->car->brand->name,
//                        $this->car->models->name,
                        $this->car->detail->name,
                        $this->car->grade->name
                ]);
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

        public function orderer(){
                return $this->hasOne(User::class, 'id', 'orderer_id');
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
                if($this->cars_id) {
                        return $this->hasOne(\App\Models\Car::class, 'id','cars_id');
                }else{
                        return $this->hasOne(OrderCar::class, 'orders_id','id');
                }
        }




        public function reservation(){
                return $this->hasOne(\App\Models\Reservation::class, 'orders_id','id');
        }



        public function garage(){
                return $this->hasOne(\App\Models\User::class, 'id','garage_id');
        }

        //========================== 진단 수정중
        public function diagnoses(){
                return $this->hasMany(\App\Models\Diagnosis::class, 'orders_id', 'id');
        }


        public function getDiagnosis() {
                $handler = new DiagnosisRepository();
                return $handler->prepare($this->id)->get();
        }


        // 인증서 발급여부
        public function isIssued() {
                return $this->status_cd == 109;
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

        public function getExteriorPicture(){
            $pictures = Diagnosis::where('orders_id', $this->id)->where('group', 2008)->get();
            return $pictures;
        }

}
