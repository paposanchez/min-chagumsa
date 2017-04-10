<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert(['name' => 'Administrator', 'email' => 'admin@2by.kr', 'password' => bcrypt('asd#123'), 'status_cd' => 1]);
        DB::table('users')->insert(['name' => 'Daily Jude', 'email' => 'user@2by.kr', 'password' => bcrypt('asd#123'), 'status_cd' => 1]);

        DB::table('roles')->insert(['name' => 'admin', 'display_name' => 'Administrator', 'description' => '사이트 최고 관리자']);
        DB::table('roles')->insert(['name' => 'member', 'display_name' => 'Member', 'description' => '사이트 일반회원']);

        DB::table('role_user')->insert(['user_id' => 1, 'role_id' => 1]);
        DB::table('role_user')->insert(['user_id' => 2, 'role_id' => 2]);
    }

}
