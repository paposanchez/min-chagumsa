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
        'car_sort_cd',      //차량 종류
        'commission',       //수수료율
        'wage',             //공임
        'guarantee',        //보증료
        'alliance_ratio',   //보쉬/브랜드 수수료율
        'certi_ratio',      //기술사(H&T)수수료율
        'self_ratio',        //짐브로스 수수료율
        'type_cd',         //
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    //주문 조회
    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'orders_id');
    }

    //아이템 조회
    public function item()
    {
        return $this->hasOne(\App\Models\Item::class, 'id', 'items_id');
    }

    //그룹 주문 조회
    public function group()
    {
        return $this->belongsTo(Order::class, 'group_id', 'group');
    }


    public function type()
    {
        return $this->hasOne(\App\Models\Code::class, 'id', 12);
    }

    public function diagnosis(){
        return $this->hasOne(Diagnosis::class, 'order_items_id', 'id')->withDefault(['type_cd' => 121]);
    }

    public function certificate(){
        return $this->hasOne(Certificate::class, 'order_items_id', 'id')->withDefault(['type_cd' => 122]);
    }

    public function warranty(){
        return $this->hasOne(Warranty::class, 'order_items_id', 'id')->withDefault(['type_cd' => 123]);
    }



}
