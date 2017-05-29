<?php

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 29.
 * Time: PM 5:59
 */
class DetailsSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        DB::table('details')->insert([
            'id' => '1',
            'name' => '쿠페'
        ]);

        DB::table('details')->insert([
            'id' => '2',
            'name' => '스포츠'
        ]);
    }
}