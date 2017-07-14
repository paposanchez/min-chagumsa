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
use App\Models\Payment;


class PaymentResult Extends Model
{
    protected $fillable = [
        'id',
        'pyments_id',
        "tid",
        "stateCd",
        "authDate",
        "authCode",
        "fnCd",
        "fnName",
        "resultCd",
        "resultMsg",
        "cardQuota",
        "cardNo",
        "cardPoint",
        "usePoint",
        "balancePoint",
        "BID",
        "cashReceiptType",
        "receiptTypeNo",
        "cashNo",
        "cashTid",
        "ediDate",
        "mid",
        "moid",
        "amt",
        "payMethod",
        "mallUserId"
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];


    public function payment(){
        return $this->belongsTo(PaymentResult::class);
    }
}
