<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:51
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Detail;
use App\Models\Order;
use App\Models\Grade;

class Car Extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'kind_cd',
        'detail_id',
        'imported_vin_number',
        'fueltype_cd',
        'engine_cd',
        'transmission_cd',
        'drivetype_cd',
        'interior_color_cd',
        'exterior_color_cd',
        'year',
        'registration_date',
        'type_cd',
        'usage_cd',
        'passenger',
        'output',
        'fuel_consumption'
    ];

    public function detail(){
        return $this->hasOne(\App\Models\Detail::class, 'id', 'details_id');
    }

    public function order(){
        return $this->hasOne(\App\Models\Order::class);
    }

    public function grade(){
        return $this->hasOne(\App\Models\Grade::class, 'id', 'grades_id');
    }

    public function model(){
        return $this->hasOne(Models::class, 'id', 'models_id');
    }

    public function brand(){
        return $this->hasOne(Brand::class, 'id', 'brands_id');
    }

    /**
     * 내장색상 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getInteriorColor(){
        return $this->hasOne(Code::class, 'id', 'interior_color_cd');
    }

    /**
     * 외장색상 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getExteriorColor(){
        return $this->hasOne(Code::class, 'id', 'exterior_color_cd');
    }

    /**
     * 연료타입 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getFuelType(){
        return $this->hasOne(Code::class, 'id', 'fueltype_cd');
    }

    /**
     * 엔진타입 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getEnginge(){
        return $this->hasOne(Code::class, 'id', 'engine_cd');
    }

    /**
     * 변속기타입 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getTransmission(){
        return $this->hasOne(Code::class, 'id', 'transmission_cd');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getDriveType(){
        return $this->hasOne(Code::class, 'id', 'drivetype_cd');
    }

    /**
     * 용도 출력
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getType(){
        return $this->hasOne(Code::class, 'id', 'type_cd');
    }

    /**
     * 자가용/영업용
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUsage(){
        return $this->hasOne(Code::class, 'id', 'usage_cd');
    }
}