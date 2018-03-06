<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\DiagnosesFile;

class Diagnoses extends Model
{

    protected $table = 'diagnoses';
    protected $fillable = [
        'id',
        'diagnosis_id',         //진단 id
        'use_image',            //이미지 사용 여부
        'use_voice',            //의견 사용 여부
        'options_cd',           //선택 항목 코드
        'selected',             //선택된 코드
        'except_options',       //양호 코드
        'description',          //설명
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    //선택 옵션 그룹 코드조회
    public function option()
    {
        return $this->hasOne(Code::class, 'id', 'options_cd');
    }

    //선택된 값 조회
    public function selected()
    {
        return $this->hasOne(Code::class, 'id', 'selected');
    }

    //이미지 제외 코드 조회
    public function except_option()
    {
        return $this->hasOne(Code::class, 'id', 'except_options');
    }

    public function diagnosesFiles()
    {
        return $this->hasMany(DiagnosesFile::class, 'diagnoses_id', 'id');
    }

    public function toDocument()
    {
        $return = $this->toArray();
        $return['except_options'] = $return['except_options'] ? explode(',', $return['except_options']) : [];
        $return['options'] = [];
        if (isset($return['options_cd'])) {
            $code = Code::where('id', $return['options_cd'])->first();
            $return['options'] = Code::getByGroupArray($code->name);
        }
        //@TODO diagnosisFiles method로 조회되지 않음...
        $return['files'] = [];
        if (isset($return['id'])) {
            $files = DiagnosesFile::where('diagnoses_id', $this->id)->get();
            foreach ($files as $file) {
                $return['files'][] = $file->toDocument();
            }
        }

        return $return;
    }

    public function files()
    {
        return $this->hasMany(DiagnosisFile::class, 'diagnoses_id', 'id');
    }

    public function file()
    {
        return $this->hasOne(DiagnosisFile::class, 'diagnoses_id', 'id');
    }

}
