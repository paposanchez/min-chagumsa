<?php

namespace App\Models;

use App\Models\Abstracts\Cache AS CacheModel;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',             //상품이름
        'price',            //가격
        'car_sort_cd',      //차량 종류. N- 국산, F-외산
        'type_cd',          //차량 종류. N- 국산, F-외산
        'status_cd',        //사용여부
        'commission',       //PG 수수료율
        'cost',             //카히스토리 고정비용
        'wage',             //정비소 공임비용
        'guarantee',        //BNP 보증료
        'alliance_ratio',   //보쉬/브랜드 수수료율
        'certi_ratio',      //기술사(H&T)수수료율
        'self_ratio',       //짐브로스 수수료율
        'layout',           //레이아웃
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function car_sort()
    {
        return $this->hasOne(Code::class, 'id', 'car_sort_cd');
    }

    public function type()
    {
        return $this->hasOne(Code::class, 'id', 'type_cd');
    }

    public function typeString()
    {
        switch($this->type_cd) {
                case 121:
                return 'D';
                case 122:
                return 'V';
                case 123:
                return 'W';
        }
    }

    public function status()
    {
        return $this->hasOne(Code::class, 'id', 'status_cd');
    }

}
