<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:51
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Models;
use App\Models\Car;

class Detail Extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'model_id',
        'name',
    ];

    public function models(){
        return $this->belongsTo(\App\Models\Models::class, 'model_id');
    }

    public function grade(){
        return $this->hasMany(\App\Models\Grade::class, 'detail_id', 'id');
    }
}