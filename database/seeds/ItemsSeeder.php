<?php

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 29.
 * Time: PM 6:01
 */
class ItemsSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        DB::table('items')->insert([
            'name' => '인증서 1',
            'price' => '100000',
            'layout' => '1',
            'created_id' => '1'
        ]);

        DB::table('items')->insert([
            'name' => '인증서 2',
            'price' => '200000',
            'layout' => '2',
            'created_id' => '2'
        ]);
    }
}