<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarNumber extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'cars_id',
        'vin_number', //차대번호
        'car_number', //차량번호
        'orders_id', //주문번호
        'use_yn' //사용여부
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function order(){
        return $this->hasOne(Order::class, 'id','orders_id');
    }

    public function car(){
        return $this->belongsTo(Car::class, 'cars_id', 'id');
    }
}
