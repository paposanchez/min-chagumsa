<?php

namespace App\Models;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{

        protected $table = 'diagnosis';
        protected $fillable = [
                'chakey',
                'order_items_id',
                'car_numbers_id',       //차람번호 테이블 id
                'expire_period',        //만료기간
                'status_cd',            //상태코드
                'open_cd',              //공개여부
                'garage_id',            //정비소 번호
                'engineer_id',          //엔지니어 번호
                'reservation_user_id',  //예약자
                'reservation_at',       //예약날짜
                'confirm_at',            //예약확정날
                'start_at',             //진단시작시간
                'completed_at',         //진단완료시간
        ];

        protected $dates = [
                'created_at', 'updated_at', 'start_at', 'completed_at', 'confirm_at', 'reservation_at'
        ];


        // 상태 조회
        public function status()
        {
                return $this->hasOne(Code::class, 'id', 'status_cd');
        }

        // 공개여부 조회
        public function open()
        {
                return $this->hasOne(Code::class, 'id', 'open_cd');
        }


        // 정비소 조회
        public function garage()
        {
                return $this->hasOne(User::class, 'id', 'garage_id');
        }

        // 앤지니어 조회
        public function engineer()
        {
                return $this->hasOne(User::class, 'id', 'engineer_id');
        }

        //주문상품 조회
        public function orderItem()
        {
                return $this->hasOne(OrderItem::class, 'id', 'order_items_id');
        }

        //진단항목 조회
        public function diagnoses()
        {
                return $this->hasMany(Diagnoses::class, 'diagnosis_id', 'id');
        }

        //예약로그 조회
        public function reservation()
        {
                return $this->hasMany(Reservation::class, 'diagnosis_id', 'id');
        }

        //============

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


        // 진단관련 이슈처리
        public static function getIssues($code, $garage_id = '', $is_count = false)
        {
                $where = Diagnosis::select();

                if ($garage_id) {
                        $where->where('garage_id', $garage_id);
                }

                switch ($code) {
                        case 117:
                        $where->where("status_cd", 112)->where('updated_at', ">", Carbon::now()->subHours(1));
                        break;

                        case 118:
                        $where->where("status_cd", 113)->where('reservation_at', "<", Carbon::now());
                        break;

                        case 119: //장기검토
                        $where->where("status_cd", 114)->where('start_at', "<", Carbon::now()->subHours(1));
                        break;

                }

                if ($is_count) {
                        return $where->count();
                } else {
                        return $where->get();
                }
        }



        // 이슈여부
        public function isIssue(){

                $today = Carbon::now();
                $issue_cd = '';

                if($this->status_cd == 112 && $today >= $this->reservation_at->addHour()){
                        $issue_cd = 117;
                }elseif ($this->status_cd == 113 && $today >= $this->confirm_at->addHour()){
                        $issue_cd = 118;
                }elseif ($this->status_cd == 114 && $today >= $this->start_at->addHour()){
                        $issue_cd = 119;
                }

                if($issue_cd)
                {
                        return Code::where('id', $issue_cd)->first();
                }else{
                        return false;
                }

        }

        // 주문 조회
        public function order()
        {
                return $this->hasOne(Order::class, 'chakey', 'chakey');
        }

        // 차량번호 테이블 조회
        public function carNumber()
        {
                return $this->hasOne(CarNumber::class, 'id', 'car_numbers_id');
        }


}
