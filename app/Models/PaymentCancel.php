<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:52
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;


class PaymentCancel Extends Model
{
    protected $fillable = [
        'id',
        'payMethod',
        'ediDate',
        'returnUrl',
        'resultMsg',
        'cancelDate',
        'cancelTime',
        'resultCd',
        'cancelNum',
        'cancelAmt',
        'moid',
        'orders_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'orders_id', 'id');
    }


}
