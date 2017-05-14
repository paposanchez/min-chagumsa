<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:42
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Feature;
use App\Models\Order;


class CarFeature extends Model
{
    protected $fillable = [
        'features_id',
        'orders_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function feature(){
        return $this->belongsTo(\App\Models\Feature::class);
    }

    public function order(){
        return $this->belongsTo(\App\Models\Order::class);
    }
}