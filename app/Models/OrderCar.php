<?php
namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;


class OrderCar Extends Model
{
    protected $primaryKey = 'orders_id';
    protected $fillable = [
        'orders_id',
        'car_number',
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


