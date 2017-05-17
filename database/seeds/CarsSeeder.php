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
            'kind_cd' => '',
            'detail_id' => '',
            'imported_vin_number' => '',
            'fueltype_cd' => '',
            'engine_cd' => '',
            'transmission_cd' => '',
            'drivetype_cd' => '',
            'interior_color_cd' => '',
            'exterior_color_cd' => '',
            'year' => '',
            'registration_date' => '',
            'type_cd' => '',
            'usage_cd' => '',
            'passenger' => '',
            'output' => '',
            'fuel_consumption' => '',
        ]);
    }

}
