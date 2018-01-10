<?php

namespace App\Models;

use App\Abstracts\Model\Cache AS CacheModel;

class Item extends CacheModel
{
        protected $primaryKey = 'id';
        protected $fillable = [
                'name',             //상품이름
                'price',            //가격
                'car_sort',         //차량 종류. N- 국산, F-외산
                'commission',       //수수료율
                'wage',             //공임
                'guarantee',        //보증료
                'alliance_ratio',   //보쉬/브랜드 수수료율
                'certi_ratio',      //기술사(H&T)수수료율
                'self_ratio',       //짐브로스 수수료율
                'layout',           //레이아웃
        ];

        protected $dates = [
                'created_at', 'updated_at'
        ];

}
