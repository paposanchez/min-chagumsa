<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Diagnosis;
use App\Models\DiagnosisFile;


class DiagnosisDetail extends Model
{

    protected $table = 'diagnosis_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'diagnosis_details_id',
        'name_cd',
        'description',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    // 일반진단항목
    public function selections(){
        return $this->hasMany(\App\Models\Codes::class, "id", "name_cd");
    }

    // 추가선택항목
    public function options(){
        return $this->hasMany(\App\Models\Codes::class, "id", "options_cd");
    }

    public function diagnosis_item(){
        return $this->hasMany(DiagnosisDetailItem::class,"diagnosis_detail_id", "id");
    }

    public function name() {
        return $this->hasOne(\App\Models\Code::class, 'id', 'name_cd');
    }
}