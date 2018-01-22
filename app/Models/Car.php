<?php
namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;


class Car Extends Model
{
        protected $primaryKey = 'id';
        protected $fillable = [
                'imported_vin_number', //'수입차 VIN 번호',
                'brands_id',
                'models_id',
                'details_id',
                'grades_id',
                'registration_date', //'최초등록일',
                'year', //'출고연도',
                'kind_cd', // '용도'
                'mileage', //'주행거리'
                'displacement', //'배기량',
                'exterior_color_cd', //'외장색',
                'exterior_color_etc',
                'fuel_consumption', //'연비',
                'engine_type', //'엔진타입',
                'transmission_cd', //'변속기',
                'fueltype_cd', //'연료타입',
                'fueltype_etc',
                'passenger' //'승차정원',
        ];

        protected $dates = [
                'created_at', 'updated_at'
        ];

        /**
        * 브랜드 출력
        * @return \Illuminate\Database\Eloquent\Relations\HasOne
        */
        public function brand(){
                return $this->hasOne(\App\Models\Brand::class, 'id','brands_id');
        }

        /**
        * 모델 출력
        * @return \Illuminate\Database\Eloquent\Relations\HasOne
        */
        public function models(){
                return $this->hasOne(\App\Models\Models::class, 'id','models_id');
        }

        /**
        * 디테일 출력
        * @return \Illuminate\Database\Eloquent\Relations\HasOne
        */
        public function detail(){
                return $this->hasOne(\App\Models\Detail::class, 'id','details_id');
        }

        /**
        * 세부 디테일 출력
        * @return \Illuminate\Database\Eloquent\Relations\HasOne
        */
        public function grade(){
                return $this->hasOne(\App\Models\Grade::class, 'id','grades_id');
        }

        /**
        * 외장색상 출력
        * @return \Illuminate\Database\Eloquent\Relations\HasOne
        */
        public function getExteriorColor(){
                return $this->hasOne(Code::class, 'id', 'exterior_color_cd');
        }

        /**
        * 연료타입 출력
        * @return \Illuminate\Database\Eloquent\Relations\HasOne
        */
        public function getFuelType(){
                return $this->hasOne(\App\Models\Code::class, 'id', 'fueltype_cd');
        }

        /**
        * 변속기타입 출력
        * @return \Illuminate\Database\Eloquent\Relations\HasOne
        */
        public function getTransmission(){
                return $this->hasOne(Code::class, 'id', 'transmission_cd');
        }

        /**
        * 차종타입 출력
        * @return \Illuminate\Database\Eloquent\Relations\HasOne
        */
        public function getKind(){
                return $this->hasOne(Code::class, 'id', 'kind_cd');
        }


        // 해당 주문의 차량 풀네임을 조회
        public function getFullName()
        {
                return implode(" ", [
                        $this->brand->name,
                        //                        $this->car->models->name,
                        $this->detail->name,
                        $this->grade->name
                ]);
        }
}
