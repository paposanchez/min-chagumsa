<?php

namespace App\Models;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Diagnoses;

class Diagnosis extends Model
{
    protected $table = 'diagnosis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'orders_id',
        'car_numbers_id',   //차람번호 테이블 id
        'expire_period',    //만료기간
        'status_cd',    //상태코드
        'open_cd',  //공개여부
        'garage_id',    //정비소 번호
        'engineer_id',  //엔지니어 번호
        'start_at',     //진단시작시간
        'completed_at',       //진단완료시간
        'reservation_at',   //예약날짜
        'confirm_at'        //예약확정날
    ];

    protected $dates = [
        'created_at', 'updated_at','start_at', 'completed_at', 'confirm_at', 'reservation_at'
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

    // 차량번호 테이블 조회
    public function carNumber(){
        return $this->belongsTo(CarNumber::class, 'car_numbers_id', 'id');
    }

    // 상태 조회
    public function status(){
        return $this->hasOne(Code::class, 'id', 'status_cd');
    }

    // 공개여부 조회
    public function open(){
        return $this->hasOne(Code::class, 'id', 'open_cd');
    }

    // 정비소 조회
    public function garage(){
        return $this->hasOne(User::class, 'id', 'garage_id');
    }
    // 앤지니어 조회
    public function engineer(){
        return $this->hasOne(User::class, 'id', 'engineer_id');
    }

    //주문상품 조회
    public function orderItem(){
        return $this->hasOne(OrderItem::class, 'id', 'order_items_id');
    }

    //진단항목 조회
    public function diagnoses(){
        return $this->hasMany(Diagnoses::class, 'diagnosis_id', 'id');
    }

    //예약로그 조회
    public function reservation(){
        return $this->hasMany(Reservation::class, 'diagnosis_id', 'id');
    }

}
