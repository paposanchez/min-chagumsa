<?php

use Illuminate\Database\Seeder;

class BoardsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('boards')->insert(['name' => '공지사항', 'status_cd' => 3]);
        DB::table('boards')->insert(['name' => 'FAQ', 'status_cd' => 3]);
        DB::table('boards')->insert(['name' => '1:1문의', 'status_cd' => 3]);
    }

}
