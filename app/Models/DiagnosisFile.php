<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class DiagnosisFile extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'diagnoses_id', //진단정보 id
        'original',     //원본 파일명
        'source',       //업로드 파일명
        'path',         //저장 경로
        'mime',         //파일형식
        'size',         //파일 사이즈
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    //진단항목 조회
    public function diagnoses()
    {
        return $this->belongsTo(Diagnoses::class, 'id', 'diagnoses_id');
    }

    //실제 파일 경로
    public function getRealPath($prepath = '')
    {
        return storage_path($prepath . $this->path . '/' . $this->source);
    }

    //샘플 파일 경로
    public function getPreviewPath()
    {
        return 'http://cdn.chagumsa.com/diagnosis/' . $this->id;
    }
}
