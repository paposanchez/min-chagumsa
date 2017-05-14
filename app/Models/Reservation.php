<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 3:01
 */

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class Reservation extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'orders_id',
        'garage_id',
        'reservation_at',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function order(){
        return $this->belongsTo(\App\Models\Order::class);
    }
}