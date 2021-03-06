<?php

namespace App\Models;

use App\Models\Abstracts\Cache AS CacheModel;

class Models extends CacheModel
{

        protected $table = 'models';
        protected $primaryKey = 'id';
        protected $fillable = [
                'brands_id',
                'name'
        ];
        protected $dates = ['created_at', 'updated_at'];


        public function brand(){
                return $this->belongsTo(\App\Models\Brand::class, 'id', 'brand_id');
        }

        public function detail(){
                return $this->hasMany(\App\Models\Detail::class, 'model_id', 'id');
        }

        public function car(){
                return $this->belongsTo(\App\Models\Car::class);
        }
}
