<?php

use Illuminate\Database\Seeder;

class CodesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('codes')->insert(['group' => 'user_status', 'name' => 'active']);
        DB::table('codes')->insert(['group' => 'user_status', 'name' => 'wait']);
        
        DB::table('codes')->insert(['group' => 'yn', 'name' => 'yes']);
        DB::table('codes')->insert(['group' => 'yn', 'name' => 'no']);
        DB::table('codes')->insert(['group' => 'post_shown_role', 'name' => 'private']);
        DB::table('codes')->insert(['group' => 'post_shown_role', 'name' => 'secret']);
        DB::table('codes')->insert(['group' => 'post_shown_role', 'name' => 'public']);
        
        // 8,9,10
        DB::table('codes')->insert(['group' => 'post_search_field', 'name' => 'subject']);
        DB::table('codes')->insert(['group' => 'post_search_field', 'name' => 'content']);
        DB::table('codes')->insert(['group' => 'post_search_field', 'name' => 'writer_name']);
        
        
        
    }

}
