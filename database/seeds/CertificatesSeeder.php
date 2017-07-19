<?php

use Illuminate\Database\Seeder;

class CertificatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('certificates')->insert([
            "orders_id" => 4, //주문서 번호
            "price" => 2500, //차량 평가액. 만원단위
            "grade" => "A", // 평가등급. 해당 데이터 내용 확인 필요함.
            "expire_period" => 30, // 인증보증기간, 일단위. 기본 30일
            "opinion" => "인증서 테스트를 위한 종합 의견입니다.", //종합의견
            "history_insurance" => 0, //보험 사고 이력 개수
            "history_insurance_file" => 0, // 보험사고이력 이미지 업로드여부. ';'로 구분함.
            "history_owner" => 1, //소유자 이력수
            "history_maintance" => 2, //정비 이력수
            "history_purpose" => "[\"\uacbd\uae30\ub3c4 \uc6a9\uc778\uc2dc\",\"\uacbd\uae30\ub3c4 \ud30c\uc8fc\uc2dc\",\"\uacbd\uae30\ub3c4 \uad11\uba85\uc2dc\"]", //용도변경이력
            "history_garage" => "[\"\uacbd\uae30\ub3c4 \uad11\uba85\uc2dc\",\"\uacbd\uae30\ub3c4 \uc6a9\uc778\uc2dc\",\"\uacbd\uae30\ub3c4 \uacfc\ucc9c\uc2dc\",\"\uc804\ub77c\ubd81\ub3c4 \ub0a8\uc6d0\"]", //차고지 이력
            "valuation" => 1050, //평가액
            "basic_registraion" => 1238, //등록일보정, 초과로 설정
            "basic_registraion_depreciation" => -500, //등록인 보정 감가액
            "basic_mounting_cd" => 300, //장착품(추가옵션) 평가액
            "basic_etc" => 200, // 색상 및 기타 감가액
            "usage_mileage_cd" => 1282, //주행거리 코드. 표준
            "usage_mileage_depreciation" => -200, // 주행거리 감가액
            "usage_history_cd" => 1286, //사고,수리 이력. 단순교환
            "usage_history_depreciation" => -300, //감가액
            "performance_exterior_cd" => 1199, // 외관(외장) 상태. 보통
            "performance_interior_cd" => 1198, // 실내,내장 상태 코드. 양호
            "performance_device_cd" => 1199, //주요장치 성능 상태 코드. 보통
            "performance_tire_cd" => 1200, //휠,타이어 성능 상태 코드. 불량/정비요
            "performance_depreciation" => -350, // 차량성능상태 감가 금액
            "special_flooded_cd" => 4, //침수여부 코드
            "special_fire_cd" => 4, //화재차량여부 코드
            "special_fulllose_cd" => 4,//
            "special_remodel_cd" => 4, //불법개조여부 코드
            "special_depreciation" => -300, //특별요일 감가금액
            "special_etc_cd" => 4, //기타요인 코드
            "new_car_price" => 3500, //신차가격
            "vat" => 3, //신차가격 부가세 포함여부
            "vin_yn_cd" => 3, //차대번호 동일성 여 코드. 예
        ]);
    }
}
