<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'items_id',         //아이템 아이디
        'orders_id',        //주문 아이디
        'group_id',         //주문 그룹 아이디
        'price',            //가격
        'car_sort',         //차량 종류. N- 국산, F-외산
        'commission',       //수수료율
        'wage',             //공임
        'guarantee',        //보증료
        'alliance_ratio',   //보쉬/브랜드 수수료율
        'certi_ratio',      //기술사(H&T)수수료율
        'self_ratio'        //짐브로스 수수료율
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    //주문 조회
    public function order(){
        return $this->belongsTo(Order::class, 'orders_id', 'id');
    }

    //아이템 조회
    public function item(){
        return $this->belongsTo(Item::class, 'items_id', 'id');
    }

    //그룹 주문 조회
    public function group(){
        return $this->belongsTo(Order::class, 'group_id', 'group');
    }

}
