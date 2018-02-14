<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:51
 */

namespace App\Models;

use DB;
use App\Models\Models;
use App\Models\Car;
use App\Models\Abstracts\Cache AS CacheModel;

class Detail extends CacheModel
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'models_id',
        'name',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function models(){
        return $this->belongsTo(\App\Models\Models::class,'id', 'model_id');
    }

    public function grade(){
        return $this->hasMany(\App\Models\Grade::class, 'detail_id', 'id');
    }

    public function car(){
        return $this->belongsTo(\App\Models\Car::class);
    }
}
