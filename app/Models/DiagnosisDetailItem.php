<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Diagnosis;
use App\Models\DiagnosisFile;

class DiagnosisDetailItem extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'diagnosises_id',
        'name_cd',
        'value_cd',
        'option_cd',
        'option_value_cd',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function diagnosis(){
        return $this->belongsTo(\App\Models\Diagnosis::class);
    }

    // 일반진단항목
    public function selections(){
        return $this->hasMany(\App\Models\Codes::class, "id", "name_cd");
    }

    // 추가선택항목
    public function options(){
        return $this->hasMany(\App\Models\Codes::class, "id", "options_cd");
    }

    public function diagnosis_file(){
        return $this->hasMany(\App\Models\DiagnosisFile::class);
    }
}