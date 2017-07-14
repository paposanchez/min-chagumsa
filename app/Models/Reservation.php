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
        'comment',
        'created_id',
        'updated_id'
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'orders_id', 'id');
    }

    public function creater(){
        return $this->hasOne(User::class, 'created_id', 'id');
    }

    public function updater(){
        return $this->hasOne(User::class, 'updated_id', 'id');
    }

    /**
     * 예약확정여부
     */
    public function isFinal() {
        if(is_null($this->updated_at) === false) {
            return true;
        }
        return false;

    }

}