<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Certificate Extends Model
{
        protected $table = 'certificates';

        protected $fillable = [
                'orders_id',
                'price',
                'grade',
                'expire_period',
                'pictures',
                'opinion',
                'history_insurance',
                'history_insurance_file',
                'history_owner',
                'history_maintance',
                'history_purpose',
                'history_garage',
                'valuation',
                'basic_registraion',
                'basic_registraion_depreciation',
                'basic_mounting_cd',
                'basic_etc',
                'usage_mileage_cd',
                'usage_mileage_depreciation',
                'usage_history_cd',
                'usage_history_depreciation',
                'performance_exterior_cd',
                'performance_flooded_cd',
                'performance_consumption_cd',
                'performance_broken_cd',
                'performance_power_cd',
                'performance_electronic_cd',
                'performance_interior_cd',
                'performance_exteriortest_cd',
                'performance_plugin_cd',
                'performance_engine_cd',
                'performance_steering_cd',
                'performance_tire_cd',
                'performance_accident_cd',
                'performance_interiortest_cd',
                'performance_driving_cd',
                'performance_transmission_cd',
                'performance_braking_cd',
                'performance_depreciation',
                'special_flooded_cd',
                'special_fire_cd',
                'special_fulllose_cd',
                'special_remodel_cd',
                'special_etc_cd',
                'new_car_price',
                'vat',
                'vin_yn_cd',
                'special_depreciation',
                'exterior_comment',
                'flooded_comment',
                'consumption_comment',
                'broken_comment',
                'power_comment',
                'electronic_comment',
                'interior_comment',
                'exteriortest_comment',
                'plugin_comment',
                'engine_comment',
                'steering_comment',
                'tire_comment',
                'accident_comment',
                'interiortest_comment',
                'driving_comment',
                'transmission_comment',
                'braking_comment',
                'basic_depreciation'
        ];


        protected $primaryKey = 'orders_id';
        protected $dates = [
                'created_at', 'updated_at'
        ];

        public function order(){
                return $this->belongsTo(\App\Models\Order::class, 'orders_id', 'id');
        }
        // 인증서 만료여부
        public function isExpired()
        {
                return  Carbon::now() >= $this->updated_at->addDays($this->expire_period);
        }

        // 인증서 만료일
        public function getExpireDate()
        {
                if($this->updated_at) {
                        return $this->updated_at->addDays($this->expire_period);
                }else{
                        return;
                }
        }

        // 인증서 만료일 카운트다운
        public function getCountdown()
        {
                if($this->updated_at) {
                        return $this->updated_at->addDays($this->expire_period)->diffInDays(Carbon::now());
                }else{
                        return 0;
                }
        }

        // 설정된 대표이미지 목록화
        public function getPictures(){
                $images = explode(',',$this->pictures);

                if(count($images))
                {
                        return File::whereIn('id', $images)->get();
                }else{
                        return null;
                }
        }

        public function getVinCd(){
                return $this->hasOne(Code::class, 'id', 'vin_yn_cd');
        }

        // 차량등급코드
        public function certificate_grade() {
                return $this->hasOne(Code::class, 'id', 'grade');
        }

        public function basic_mounting(){
                return $this->hasOne(Code::class, 'id', 'basic_mounting_cd');
        }
        public function usage_mileage(){
                return $this->hasOne(Code::class, 'id', 'usage_mileage_cd');
        }
        public function usage_history(){
                return $this->hasOne(Code::class, 'id', 'usage_history_cd');
        }
        public function performance_exterior(){
                return $this->hasOne(Code::class, 'id', 'performance_exterior_cd');
        }
        public function performance_exteriortest(){
                return $this->hasOne(Code::class, 'id', 'performance_exteriortest_cd');
        }
        public function performance_flooded(){
                return $this->hasOne(Code::class, 'id', 'performance_flooded_cd');
        }
        public function performance_consumption(){
                return $this->hasOne(Code::class, 'id', 'performance_consumption_cd');
        }
        public function performance_broken(){
                return $this->hasOne(Code::class, 'id', 'performance_broken_cd');
        }
        public function performance_power(){
                return $this->hasOne(Code::class, 'id', 'performance_power_cd');
        }
        public function performance_electronic(){
                return $this->hasOne(Code::class, 'id', 'performance_electronic_cd');
        }
        public function performance_interior(){
                return $this->hasOne(Code::class, 'id', 'performance_interior_cd');
        }
        public function performance_interiortest(){
                return $this->hasOne(Code::class, 'id', 'performance_interiortest_cd');
        }
        public function performance_plugin(){
                return $this->hasOne(Code::class, 'id', 'performance_plugin_cd');
        }
        public function performance_engine(){
                return $this->hasOne(Code::class, 'id', 'performance_engine_cd');
        }
        public function performance_steering(){
                return $this->hasOne(Code::class, 'id', 'performance_steering_cd');
        }
        public function performance_tire(){
                return $this->hasOne(Code::class, 'id', 'performance_tire_cd');
        }
        public function performance_accident(){
                return $this->hasOne(Code::class, 'id', 'performance_accident_cd');
        }

        public function performance_driving(){
                return $this->hasOne(Code::class, 'id', 'performance_driving_cd');
        }
        public function performance_transmission(){
                return $this->hasOne(Code::class, 'id', 'performance_transmission_cd');
        }
        public function performance_braking(){
                return $this->hasOne(Code::class, 'id', 'performance_braking_cd');
        }
        public function special_flooded(){
                return $this->hasOne(Code::class, 'id', 'special_flooded_cd');
        }
        public function special_fire(){
                return $this->hasOne(Code::class, 'id', 'special_fire_cd');
        }
        public function special_fulllose(){
                return $this->hasOne(Code::class, 'id', 'special_fulllose_cd');
        }
        public function special_remodel(){
                return $this->hasOne(Code::class, 'id', 'special_remodel_cd');
        }
        public function special_etc(){
                return $this->hasOne(Code::class, 'id', 'special_etc_cd');
        }





}
