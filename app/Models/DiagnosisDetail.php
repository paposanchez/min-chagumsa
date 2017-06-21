<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;



class DiagnosisDetail extends Model
{

    protected $table = 'diagnosis_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'diagnosis_details_id',
        'parent_id',
        'name_cd',
        'description',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function diagnosis_details(){
        return $this->belongsTo(\App\Models\DiagnosisDetails::class, "id", "diagnosis_details_id");
    }

    public function diagnosis_item(){
        return $this->hasMany(\App\Models\DiagnosisDetailItem::class,"diagnosis_detail_id", "id");
    }

    public function name() {
        return $this->hasOne(\App\Models\Code::class, 'id', 'name_cd');
    }

    public function parents(){
        return $this->belongsTo(\App\Models\DiagnosisDetail::class,"id", "parent_id");
    }

}