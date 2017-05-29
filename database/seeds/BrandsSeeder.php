<?php

use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder {
    public function run(){
        DB::table('brands')->insert([
            'id' => '1',
            'name' => '기아'
        ]);

        DB::table('brands')->insert([
            'id' => '2',
            'name' => '현대'
        ]);
    }
}
