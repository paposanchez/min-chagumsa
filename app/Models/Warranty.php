<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    protected $table = 'warranties';
    protected $primaryKey = 'id';
    protected $fillable = [
        'orders_id',        //주문 id
        'order_items_id',   //주문아이템 id
        'car_numbers_id',   //차량번호테이블 id
        'expire_period',    //만료기간
        'status_cd',        //상태코드
        'open_cd',          //공개여부
        'chakey',
        'diagnosis_id'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'expired_at'
    ];

    // 인증서 만료여부
    public function isExpired()
    {
        return Carbon::now() >= $this->updated_at->addDays($this->expire_period);
    }

    // 인증서 만료일
    public function getExpireDate()
    {
        if ($this->updated_at) {
            return $this->updated_at->addDays($this->expire_period);
        } else {
            return;
        }
    }

    // 인증서 만료일 카운트다운
    public function getCountdown()
    {
        if ($this->updated_at) {
            return $this->updated_at->addDays($this->expire_period)->diffInDays(Carbon::now());
        } else {
            return 0;
        }
    }

    //주문 조회
    public function order(){
        return $this->belongsTo(Order::class, 'orders_id', 'id');
    }

    //주문상품 조회
    public function orderItem(){
        return $this->hasOne(OrderItem::class, 'id', 'order_items_id');
    }

    //차량번호 테이블 조회
    public function carNumbers(){
        return $this->hasOne(CarNumber::class, 'id', 'car_numbers_id');
    }

    //상태코드 조회
    public function status(){
        return $this->hasOne(Code::class, 'id', 'status_cd');
    }

    //공개코드 조회
    public function open(){
        return $this->hasOne(Code::class, 'id', 'open_cd');
    }

    //보증내역 조회
    public function history(){
        return $this->hasMany(WarrantyHistory::class, 'warranties_id', 'id');
    }

}
