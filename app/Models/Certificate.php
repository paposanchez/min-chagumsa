<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:52
 */

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Certificate Extends Model
{
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
        'performance_interior_cd',
        'performance_device_cd',
        'performance_tire_cd',
        'performance_depreciation',
        'special_flooded_cd',
        'special_fire_cd',
        'special_fulllose_cd',
        'special_remodel_cd',
        'special_etc_cd',
        'special_depreciation',
        'new_car_price',
        'vat',
        'vin_yn_cd'
    ];
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
         return  Carbon::now() >= $this->order->diagnosed_at->addDays($this->expire_period);
    }

    public function getExpireDate()
    {
           return $this->order->diagnosed_at->addDays($this->expire_period);
    }

}
