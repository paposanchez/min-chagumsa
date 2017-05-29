<?php

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 29.
 * Time: PM 5:58
 */
class ModelsSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        DB::table('models')->insert([
            'id' => '1',
            'name' => '포르테'
        ]);

        DB::table('models')->insert([
            'id' => '2',
            'name' => '아반떼'
        ]);
    }
}