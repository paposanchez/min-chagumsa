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
use App\Models\PaymentResult;


class Payment Extends Model
{
    protected $fillable = [
        'id',
        "payMethod",
        "transType",
        "goodsName",
        "amt",
        "moid",
        "mallUserId",
        "buyerName",
        "buyerTel",
        "buyerEmail",
        "mallIp",
        "rcvrMsg",
        "ediDate",
        "encryptData",
        "userIp",
        "resultYn",
        "quotaFixed",
        "domain",
        "socketYn",
        "socketReturnURL",
        "retryUrl",
        "supplyAmt",
        "vat",
        "billReqType",
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'moid', 'id');
    }

    public function payment_result(){
        return $this->hasOne(PaymentResult::class);
    }
}
