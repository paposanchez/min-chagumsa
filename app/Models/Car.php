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
        return $this->belongsTo(\App\Models\Detail::class);
    }

    public function order(){
        return $this->hasOne(\App\Models\Order::class);
    }
}