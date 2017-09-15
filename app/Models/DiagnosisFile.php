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

class DiagnosisFile extends Model
{
        protected $primaryKey = 'id';
        protected $fillable = [
                'diagnoses_id',
                'original',
                'source',
                'path',
                'mime',
                'size'
        ];

        protected $dates = [
                'created_at', 'updated_at'
        ];

        public function diagnosis(){
                return $this->belongsTo(\App\Models\DiagnosisDetailItem::class, 'id', 'diagnoses_id');
        }

        public function getRealPath($prepath = ''){

                return storage_path($prepath . $this->path . '/' . $this->source) ;
        }
}
