<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 4. 19.
 * Time: PM 2:19
 */
use Illuminate\Database\Seeder;

class ModelsSeeder extends Seeder
{
    public function run(){
        DB::table('models')->insert([
            'brand_id' => 1,
            'name' => "아반떼 HD",
        ]);
    }

}
