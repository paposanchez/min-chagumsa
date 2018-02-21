<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Contracts\Document as IDocument;

class Certificate Extends Model implements IDocument
{
    protected $fillable = [
        'orders_id',
        'order_items_id',
        'car_numbers_id',
        'diagnosis_id',
        'status_cd',
        'open_cd',
        'expire_period',
        'technist_id',
        'vin_yn_cd',
        'new_car_price',
        'price',
        'basic_depreciation',
        'basic_registraion',
        'basic_registraion_depreciation',
        'basic_etc',
        'history_depreciation',
        'usage_mileage_cd',
        'usage_mileage_depreciation',
        'usage_history_cd',
        'usage_history_depreciation',
        'history_comment',
        'usage_flood_cd',
        'flooded_comment',
        'performance_depreciation',
        'performance_exterior_cd',
        'performance_interior_cd',
        'performance_plugin_cd',
        'performance_broken_cd',
        'performance_engine_cd',
        'performance_transmission_cd',
        'performance_power_cd',
        'performance_steering_cd',
        'performance_braking_cd',
        'performance_electronic_cd',
        'performance_tire_cd',
        'performance_driving_cd',
        'exterior_comment',
        'interior_comment',
        'plugin_comment',
        'broken_comment',
        'engine_comment',
        'transmission_comment',
        'power_comment',
        'steering_comment',
        'braking_comment',
        'electronic_comment',
        'tire_comment',
        'driving_comment',
        'special_depreciation',
        'special_fire_cd',
        'special_fulllose_cd',
        'special_remodel_cd',
        'special_etc_cd',
        'history_purpose',
        'history_garage',
        'history_insurance',
        'history_insurance_file',
        'history_owner',
        'valuation',
        'grade',
        'opinion',
        'pictures',//대표사진
        'chakey'
    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'start_at',             // 진단시작일
        'completed_at',         // 진단완료일
        'issued_at',            // 발급일
        'expired_at',           // 만료일
    ];

    // 주문 조회
    public function order()
    {
        return $this->hasOne(Order::class, 'chakey', 'chakey');
    }

    //상태 조회
    public function status()
    {
        return $this->hasOne(Code::class, 'id', 'status_cd');
    }


    //차량번호 조회
    public function carNumber()
    {
        return $this->hasOne(CarNumber::class, 'id', 'car_numbers_id');
    }

    //진단정보 조회
    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class, 'id', 'diagnosis_id');
    }

    //주문상품 조회
    public function orderItem()
    {
        return $this->hasOne(OrderItem::class, 'id', 'order_items_id');
    }

    //기술사 조회
    public function technist()
    {
        return $this->hasOne(User::class, 'id', 'technist_id');
    }

    // 설정된 대표이미지 목록화
    public function getPictures()
    {
        $images = explode(',', $this->pictures);

        if (count($images)) {
            return File::whereIn('id', $images)->get();
        } else {
            return null;
        }
    }

    //차대번호 동일성여부 조회
    public function getVinCd()
    {
        return $this->hasOne(Code::class, 'id', 'vin_yn_cd');
    }

    // 차량등급코드
    public function certificate_grade()
    {
        return $this->hasOne(Code::class, 'id', 'grade');
    }

    // 주행거리 코드
    public function usage_mileage()
    {
        return $this->hasOne(Code::class, 'id', 'usage_mileage_cd');
    }

    //사고,수리이력 코드
    public function usage_history()
    {
        return $this->hasOne(Code::class, 'id', 'usage_history_cd');
    }

    //침수점검 코드
    public function usage_flood()
    {
        return $this->hasOne(Code::class, 'id', 'usage_flood_cd');
    }

    //차량외부점검 코드
    public function performance_exterior()
    {
        return $this->hasOne(Code::class, 'id', 'performance_exterior_cd');
    }

    //고진점검 코드
    public function performance_broken()
    {
        return $this->hasOne(Code::class, 'id', 'performance_broken_cd');
    }

    //원동기 점검 코드
    public function performance_power()
    {
        return $this->hasOne(Code::class, 'id', 'performance_power_cd');
    }

    //전기 점검 코드
    public function performance_electronic()
    {
        return $this->hasOne(Code::class, 'id', 'performance_electronic_cd');
    }

    //내부 점검 코드
    public function performance_interior()
    {
        return $this->hasOne(Code::class, 'id', 'performance_interior_cd');
    }

    //전장품 점검 코드
    public function performance_plugin()
    {
        return $this->hasOne(Code::class, 'id', 'performance_plugin_cd');
    }

    //엔진 점검 코드
    public function performance_engine()
    {
        return $this->hasOne(Code::class, 'id', 'performance_engine_cd');
    }

    //조향장치 점검 코드
    public function performance_steering()
    {
        return $this->hasOne(Code::class, 'id', 'performance_steering_cd');
    }

    //타이어 점검코드
    public function performance_tire()
    {
        return $this->hasOne(Code::class, 'id', 'performance_tire_cd');
    }

    //주행테스트 점검 코드
    public function performance_driving()
    {
        return $this->hasOne(Code::class, 'id', 'performance_driving_cd');
    }

    //변속기 점검 코드
    public function performance_transmission()
    {
        return $this->hasOne(Code::class, 'id', 'performance_transmission_cd');
    }

    //제동장치 점검 코드
    public function performance_braking()
    {
        return $this->hasOne(Code::class, 'id', 'performance_braking_cd');
    }

    //화제차량 코드
    public function special_fire()
    {
        return $this->hasOne(Code::class, 'id', 'special_fire_cd');
    }

    //전손차량 코드
    public function special_fulllose()
    {
        return $this->hasOne(Code::class, 'id', 'special_fulllose_cd');
    }

    //불법개조 코드
    public function special_remodel()
    {
        return $this->hasOne(Code::class, 'id', 'special_remodel_cd');
    }

    //기타요인 코드
    public function special_etc()
    {
        return $this->hasOne(Code::class, 'id', 'special_etc_cd');
    }

    //보험사고이력 파일
    public function insurance_files()
    {
        return $this->hasMany(File::class, 'group_id', 'orders_id')->where('group', 'insurance');
    }


    // 만료여부
    public function isExpired()
    {
        return $this->status_cd == 126;
    }

    // 인증서 만료일 카운트다운
    public function getCountdown()
    {
        if ($this->isExpired()) {
            return 0;
        }
        if (is_null($this->expired_at)) {
            return -1;
        }

        return $this->expired_at->diffInDays(Carbon::now());
    }

    public function getDocumentKey()
    {
        return $this->chakey . 'C';
    }

    public function getDocumentLink()
    {
        return config('chagumsa.') . $this->getDocumentKey();
    }

    // 인증서 만료일
    public function getExpireDate()
    {
        if ($this->completed_at) {
            return $this->completed_at->addDays($this->expire_period);
        } else {
            return;
        }
    }
}
