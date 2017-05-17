<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 4. 19.
 * Time: PM 2:19
 */
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    public function run(){
        DB::table('brands')->insert([
            'name' => '현대자동차'
        ]);
    }

}
