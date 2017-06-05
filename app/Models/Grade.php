<?php

namespace App;

use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $fillable = [
        'detail_id',
        'name',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function detail(){
        return $this->belongsTo(Detail::class);
    }
}
