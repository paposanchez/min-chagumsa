<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Document as IDocument;

class Warranty extends Model implements IDocument
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
                'created_at',
                'updated_at',
                'start_at',             // 진단시작일
                'completed_at',         // 진단완료일\
                'issued_at',            // 발급일
                'expired_at',           // 만료일
        ];



        //상태코드 조회
        public function status()
        {
                return $this->hasOne(Code::class, 'id', 'status_cd');
        }


        //주문 조회
        public function order()
        {
                return $this->belongsTo(Order::class, 'chakey', 'chakey');
        }

        //주문상품 조회
        public function orderItem()
        {
                return $this->hasOne(OrderItem::class, 'id', 'order_items_id');
        }

        //차량번호 테이블 조회
        public function carNumber()
        {
                return $this->hasOne(CarNumber::class, 'id', 'car_numbers_id');
        }


        //공개코드 조회
        public function open()
        {
                return $this->hasOne(Code::class, 'id', 'open_cd');
        }

        //보증내역 조회
        public function history()
        {
                return $this->hasMany(WarrantyHistory::class, 'warranties_id', 'id');
        }


        // 만료여부
        public function isExpired() {
                return $this->status_cd == 126;
        }
        // 인증서 만료일 카운트다운
        public function getCountdown()
        {
                if($this->isExpired()){
                        return 0;
                }
                if(is_null($this->expired_at)){
                        return -1;
                }

                return $this->expired_at->diffInDays(Carbon::now());
        }
        public function getDocumentKey() {
                return $this->chakey.'W';
        }
        public function getDocumentLink() {
            return config('https://cert.chagumsa/') . $this->getDocumentKey();
        }

}
