<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:57
 */

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Diagnosis;
use App\Models\DiagnosisFile;

class DiagnosisDetails extends Model
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

    public function diagnosis_file(){
        return $this->hasMany(\App\Models\DiagnosisFile::class);
    }
}