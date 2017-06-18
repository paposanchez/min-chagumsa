<?php

/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:58
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\DiagnosisDetails;

class DiagnosisDetails extends Model {

    protected $table = 'diagnosises';
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
        return $this->belongsTo(\App\Models\Order::class);
    }

    public function diagnosis_detail() {
        return $this->hasMany(DiagnosisDetails::class);
    }

}
