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
            'detail_id' => '1'
        ]);

        DB::table('cars')->insert([
            'id' => '2',
            'name' => '2',
            'detail_id' => '2'
        ]);
    }
}