<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Brand;
use App\Models\Detail;

class Models extends Model {
    protected $primaryKey = 'id';
    protected $fillable = [
        'brand_id',
        'name'
    ];
    protected $dates = ['created_at', 'updated_at'];

//    public function getCreatedAtAttribute($date) {
//        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
//    }
//
//    public function getUpdatedAtAttribute($date) {
//        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
//    }

    public function brand(){
        return $this->belongsTo(\App\Models\Brand::class);
    }

    public function detail(){
        return $this->hasOne(\App\Models\Detail::class);
    }

    public function car(){
        return $this->belongsTo(\App\Models\Car::class);
    }

}
