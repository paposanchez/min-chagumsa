<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 4. 19.
 * Time: PM 2:19
 */
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    public function run(){
        DB::table('cars')->insert([
            'id' => 'c1',
            'kind_cd' => 1, //comment에 내용 없음. 코드표에 내용 없음.
            'detail_id' => 1,
            'imported_vin_number' => '',
            'fueltype_cd' => 1,
            'engine_cd' => 1,//엔진타입 코드표 확인 필요함.
            'transmission_cd' => 1,
            'drivetype_cd' => 1, //코멘트 없음
            'interior_color_cd' => 1,
            'exterior_color_cd' => 1,
            'year' => '2017-01-01',
            'registration_date' => '2017-05-09',
            'type_cd' => 1, //용도에 대한 부분을 코드표에서 못찾음
            'usage_cd' => 1,
            'passenger' => 5,
            'output' => '7000',// 정격출력
            'fuel_consumption' => 12.4,
        ]);
    }

}
