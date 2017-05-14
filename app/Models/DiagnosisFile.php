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

use App\Models\DiagnosisDetails;

class DiagnosisFile extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'diagnosis_details_id',
        'original',
        'source',
        'path',
        'created_at',
        'updated_at',
        'size',
        'mime',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function diagnosisDetail(){
        return $this->belongsTo(Diagnosis::class);
    }
}