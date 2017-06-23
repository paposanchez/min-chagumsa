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
        'diagnosis_detail_items_id',
        'original',
        'source',
        'path',
        'mime',
        'size'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function diagnosisDetail(){
        return $this->belongsTo(\App\Models\DiagnosisDetailItem::class, 'id', 'diagnosis_detail_items_id');
    }
}