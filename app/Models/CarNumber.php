<?php

namespace App\Models;

use App\Models\Abstracts\Cache AS CacheModel;
use Illuminate\Database\Eloquent\Model;

class CarNumber extends CacheModel
{

        protected $primaryKey = 'id';
        protected $fillable = [
                'cars_id',
                'car_number',
                'use_yn' //사용여부
        ];

        protected $dates = [
                'created_at', 'updated_at'
        ];

        public function order()
        {
                return $this->belongsTo(Order::class, 'orders_id');
        }

        public function car()
        {
                return $this->hasOne(Car::class, 'id', 'cars_id');
        }

}
