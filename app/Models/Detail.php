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
use App\Models\Grade;

class Detail Extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'model_id',
        'name',
    ];

    public function models(){
        return $this->belongsTo(\App\Models\Models::class);
    }

    public function car(){
        return $this->hasOne(\App\Models\Car::class);
    }

    public function grade(){
        return $this->hasOne(Grade::class);
    }
}