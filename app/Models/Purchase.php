<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 3:00
 */

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class Purchase extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'transaction_id',
        'amount',
        'type',
        'refund_name',
        'refund_account',
        'refund_bank',
        'status_cd',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function order(){
        return $this->hasOne(\App\Models\Order::class);
    }
}