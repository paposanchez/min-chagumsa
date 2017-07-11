<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Code;

class Diagnosis extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'orders_id',
        'group',
        'name_cd',
        'use_image',
        'use_voice',
        'options_cd',
        'selected',
        'except_options',
        'description'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    // 파일
    public function files(){
        return $this->hasMany(\App\Models\DiagnosisFile::class, 'diagnoses_id', 'id');
    }

    public function name() {
        return $this->hasOne(Code::class, 'id', 'name_cd');
    }

    public function selected_code(){
        return $this->hasOne(Code::class, "id", "selected");
    }

    // 추가선택코드데이터
    public function options(){
        return $this->hasOne(Code::class, "id", "options_cd");
    }
    // 코드데이터로 옵션그룹서택
    public static function getOptions($options_cd){
        if($options_cd) {
            // id로 name값을 조회한다
            $option = Code::find($options_cd);            
            return  Code::getByGroupArray($option->name);
        }else{
            return null;
        }
        // return $this->hasMany(\App\Models\Code::class, "id", "options_cd");

    }
}