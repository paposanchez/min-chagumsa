<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;



class Diagnoses extends Model
{

    protected $table = 'diagnoses';
    protected $fillable = [
        'diagnosis_id', //진단 id
        'group',    //진단 항목 그룹 코드
        'name_cd',  //항목 이름 코드
        'use_image',    //이미지 사용 여부
        'use_voice',    //의견 사용 여부
        'options_cd',   //선택 항목 코드
        'selected',     //선택된 코드
        'except_options',   //양호 코드
        'description',  //설명
        'comment'   //음성추출 텍스
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];


    //진단 그룹 조회
    public function group(){
        return $this->hasOne(Code::class, 'id', 'group');
    }

    //진단 항목 조회
    public function name(){
        return $this->hasOne(Code::class, 'id', 'name_cd');
    }

    //선택 옵션 그룹 조회
    public function option(){
        return $this->hasOne(Code::class, 'id', 'options_cd');
    }

    //선택된 값 조회
    public function selected(){
        return $this->hasOne(Code::class, 'id', 'selected');
    }

    //이미지 제외 코드 조회
    public function except_option(){
        return $this->hasOne(Code::class, 'id', 'except_options');
    }

}
