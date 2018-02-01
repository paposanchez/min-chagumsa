<?php

namespace App\Models;

use App\Abstracts\Model\Cache AS CacheModel;

class Grade extends CacheModel
{

    //
    protected $fillable = [
        'details_id',
        'name',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function detail(){
        return $this->belongsTo(Detail::class, 'id', 'detail_id');
    }

}
