<?php

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 29.
 * Time: PM 6:00
 */
class CarsSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        DB::table('cars')->insert([
            'id' => '1',
            'kind_cd' => '1',
            'detail_id' => '138',
            // 'imported_vin_number' = > '0000',
            'fueltype_cd' => '61',
            // 'engin_cd' = > '',
            'transmission_cd' => '75',
            // 'drivetype_cd' = > '',
            'interior_color_cd' => '1150',
            'exterior_color_cd' => '1150',
            'year' => '2017-06-09',
            'registration_date' => '2017-06-09',
            // 'type_cd' = > '',
            // 'usage_cd' = > '',
            'passenger' => '5',
            'output' => '190ps/4000rpm',
            'fuel_consumption' => '14.0'
        ]);
    }
}



