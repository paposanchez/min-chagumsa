<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:59
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class Item extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'price',
        'layout',
        'created_id',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function order(){
        return $this->hasOne(\App\Models\Order::class);
    }
}