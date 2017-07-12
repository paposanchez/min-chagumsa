<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
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
