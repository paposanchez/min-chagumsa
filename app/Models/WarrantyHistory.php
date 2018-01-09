<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarrantyHistory extends Model
{
    protected $table = 'warranty_history';
    protected $primaryKey = 'id';
    protected $fillable = [
        'warranties_id',    //보증 id
        'warranty_history' //보증내역
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    //보증 조회
    public function warranty(){
        return $this->belongsTo(Warranty::class, 'warranties_id', 'id');
    }
}
