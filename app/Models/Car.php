<?php
namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;


class Car Extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', //'VIN Number, 기술사 입력전까지 차량번호',
        'vin_number', //
        'imported_vin_number', //'수입차 VIN 번호',
        'kind_cd', //
        'fueltype_cd', //'연료타입',
        'engine_cd', //'엔진타입',
        'transmission_cd', //'변속기',
        'drivetype_cd', //
        'interior_color_cd', //'내장색',
        'exterior_color_cd', //'외장색',
        'year', //'출고연도',
        'registration_date', //'최초등록일',
        'type_cd', //'용도',
        'usage_cd', //,
        'passenger', //'승차정원',
        'output', //'정격출력',
        'fuel_consumption', //'연비',
        'brands_id',
        'models_id', //
        'details_id',
        'grades_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];


    public function brand(){
        return $this->hasOne(\App\Models\Brand::class, 'id','brands_id');
    }

    public function models(){
        return $this->hasOne(\App\Models\Models::class, 'id','models_id');
    }

    public function detail(){
        return $this->hasOne(\App\Models\Detail::class, 'id','details_id');
    }
    
    public function grade(){
        return $this->hasOne(\App\Models\Grade::class, 'id','grades_id');
    }    
}


