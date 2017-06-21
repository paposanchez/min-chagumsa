<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Models extends Model {

    protected $table = 'models';
    protected $primaryKey = 'id';
    protected $fillable = [
        'brand_id',
        'name'
    ];
    protected $dates = ['created_at', 'updated_at'];


    public function brand(){
        return $this->belongsTo(\App\Models\Brand::class, 'id', 'brand_id');
    }

    public function detail(){
        return $this->hasMany(\App\Models\Detail::class, 'model_id', 'id');
    }

}
