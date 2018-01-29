<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarNumber extends Model
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

    public function car()
    {
        return $this->belongsTo(Car::class, 'cars_id', 'id');
    }
}
