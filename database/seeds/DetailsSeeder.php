<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 4. 19.
 * Time: PM 2:19
 */
use Illuminate\Database\Seeder;

class DetailsSeeder extends Seeder
{
    public function run(){
        DB::table('details')->insert([
            'model_id' => 1,
            'name' => '아반떼 HD'
        ]);
    }

}
