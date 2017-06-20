<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class DiagnosisDetails extends Model {

    protected $table = 'diagnosis_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'orders_id',
        'name_cd',
        'sound_file',
        'extraction',
        'created_at',
        'updated_at',
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function order() {
        return $this->belongsTo(\App\Models\Order::class, 'orders_id', 'id');
    }

    public function detail() {
        return $this->hasMany(\App\Models\DiagnosisDetail::class, 'diagnosis_details_id', 'id');
    }

    public function name() {
        return $this->hasOne(\App\Models\Code::class, 'id', 'name_cd');
    }

}
