<?php

namespace App\Models;

use App\Abstracts\Model\Cache AS CacheModel;

class Item extends CacheModel
{
        protected $primaryKey = 'id';
        protected $fillable = [
                'name',             //상품이름
                'price',            //가격
                'car_sort_cd',       //차량 종류. N- 국산, F-외산
                'type_cd',         //차량 종류. N- 국산, F-외산

                'commission',       //수수료율
                'wage',             //공임
                'guarantee',        //보증료
                'alliance_ratio',   //보쉬/브랜드 수수료율
                'certi_ratio',      //기술사(H&T)수수료율
                'self_ratio',       //짐브로스 수수료율
                'layout',           //레이아웃
                'is_use',           //레이아웃
        ];

        protected $dates = [
                'created_at', 'updated_at'
        ];

        public function car_sort(){
                return $this->hasOne(Code::class, 'id', 'car_sort_cd');
        }
        public function type(){
                return $this->hasOne(Code::class, 'id', 'type_cd');
        }

}
