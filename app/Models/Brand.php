<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:28
 */

namespace App\Models;

use DB;
use App\Abstracts\Model\Cache AS CacheModel;

class Brand extends CacheModel
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function models(){
        return $this->hasMany(\App\Models\Models::class, 'brand_id', 'id');
    }
}
