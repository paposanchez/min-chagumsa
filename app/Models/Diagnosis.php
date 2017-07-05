<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'order_id',
        'group',
        'use_image',
        'use_voice',
        // 'name_cd',
        'options_cd',
        'selected',
        'required_image_options',
        'description',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    // 파일
    public function files(){
        return $this->hasMany(\App\Models\DiagnosisFile::class, 'diagnoses_id', 'id');
    }

    public function name() {
        return $this->hasOne(\App\Models\Code::class, 'id', 'name_cd');
    }

    public function selected_code(){
        return $this->hasOne(\App\Models\Code::class, "id", "selected");
    }

    // 추가선택항목
    public function options(){
        return $this->hasOne(\App\Models\Code::class, "id", "options_cd");
    }

    public function getOptions($options_cd){
        if($options_cd) {
            $option = \App\Models\Code::find($options_cd);            
            return  \App\Models\Code::getByGroupArray($option->name);
        }else{
            return null;
        }
        // return $this->hasMany(\App\Models\Code::class, "id", "options_cd");

    }
}