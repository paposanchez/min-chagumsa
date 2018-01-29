<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarNumber extends Model
{
        protected $primaryKey = 'id';
        protected $fillable = [
                'cars_id',    //차량번호
                'car_number', //차량번호
                'use_yn' //사용여부
        ];

        protected $dates = [
                'created_at', 'updated_at'
        ];

        public function order(){
                return $this->belongsTo(Order::class, 'orders_id');
        }

        public function car(){
                return $this->hasOne(Car::class, 'id', 'cars_id');
        }
}
