<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class DiagnosesFile extends Model
{
        protected $primaryKey = 'id';
        protected $table = 'diagnoses_files';
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

        //실제 파일 경로
        public function getRealPath($prepath = '')
        {
                return storage_path($prepath . $this->path . '/' . $this->source);
        }

        //샘플 파일 경로
        public function getPreviewPath()
        {
                return config('app.cdn').'/'. $this->id;
        }


        public function toDocument()
        {
                return [
                        'id'            => $this->id,
                        'diagnoses_id'  => $this->diagnoses_id,
                        //@TODO  original은 예약어....
                        'original'      => $this->attributes['original'],
                        'source'        => $this->source,
                        'path'          => $this->path,
                        'mime'          => $this->mime,
                        'size'          => $this->size,
                        'fullpath'      => $this->getRealPath('app/diagnosis'),
                        'preview'       => $this->getPreviewPath(),
                        'created_at'    => $this->created_at->format("Y-m-d H:i:s"),
                        'updated_at'    => ($this->updated_at ? $this->updated_at->format("Y-m-d H:i:s") : '')
                ];
        }
}
