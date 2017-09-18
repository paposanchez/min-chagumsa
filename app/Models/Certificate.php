<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Certificate Extends Model
{
        protected $table = 'certificate_new';

        protected $fillable = [
                'orders_id',
                'price',
                'grade',
                'expire_period',
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
                'performance_powor_cd',
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
                'powor_comment',
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
                'braking_comment'
        ];


        // protected $fillable = [
        //         'orders_id',
        //         'price',
        //         'grade',
        //         'expire_period',
        //         'opinion',
        //         'history_insurance',
        //         'history_insurance_file',
        //         'history_owner',
        //         'history_maintance',
        //         'history_purpose',
        //         'history_garage',
        //         'valuation',
        //         'basic_registraion',
        //         'basic_registraion_depreciation',
        //         'basic_mounting_cd',
        //         'basic_etc',
        //         'usage_mileage_cd',
        //         'usage_mileage_depreciation',
        //         'usage_history_cd',
        //         'usage_history_depreciation',
        //         'performance_exterior_cd',
        //         'performance_interior_cd',
        //         'performance_device_cd',
        //         'performance_tire_cd',
        //         'performance_depreciation',
        //         'special_flooded_cd',
        //         'special_fire_cd',
        //         'special_fulllose_cd',
        //         'special_remodel_cd',
        //         'special_etc_cd',
        //         'special_depreciation',
        //         'new_car_price',
        //         'vat',
        //         'vin_yn_cd'
        // ];

        protected $primaryKey = 'orders_id';
        protected $dates = [
                'created_at', 'updated_at'
        ];

        public function order(){
                return $this->belongsTo(\App\Models\Order::class, 'orders_id', 'id');
        }

        public function getVinCd(){
                return $this->hasOne(Code::class, 'id', 'vin_yn_cd');
        }

        public function isExpired()
        {
                return  Carbon::now() >= $this->updated_at->addDays($this->expire_period);
        }

        public function getExpireDate()
        {
                if($this->updated_at) {
                        return $this->updated_at->addDays($this->expire_period);
                }else{
                        return;
                }
        }

        public function getCountdown()
        {
                if($this->updated_at) {
                        return $this->updated_at->addDays($this->expire_period)->diffInDays(Carbon::now());
                }else{
                        return 0;
                }
        }


}
