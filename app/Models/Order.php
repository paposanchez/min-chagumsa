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
use App\Models\Diagnosis;
use App\Models\Item;
use App\Models\Reservation;

class Order Extends Model
{
    protected $fillable = [
        'id',
        'datekey',
        'car_number',
        'car_id',
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
        'created_at', 'updated_at'
    ];

    public function certificates(){
        return $this->hasOne(Certification::class);
    }

    public function car_feature(){
        return $this->hasOne(CarFeature::class);
    }

    public function diagnosis(){
        return $this->hasMany(\App\Models\Diagnosis::class);
    }

    public function settlement_features(){
        return $this->hasMany(\App\Models\SettlementFeature::class);
    }

    public function item(){
        return $this->belongsTo(\App\Models\Item::class);
    }

    public function purchase(){
        return $this->belongsTo(\App\Models\Purchase::class);
    }

    public function car(){
        return $this->belongsTo(\App\Models\Car::class);
    }

    public function reservation(){
        return $this->hasOne(\App\Models\Reservation::class);
    }
}