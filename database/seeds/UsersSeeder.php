<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // 롤
        DB::table('roles')->insert(['name' => 'admin', 'display_name' => 'Administrator', 'description' => '관리자']);
        DB::table('roles')->insert(['name' => 'member', 'display_name' => 'Member', 'description' => '일반회원']);
        DB::table('roles')->insert(['name' => 'alience', 'display_name' => 'alience', 'description' => '얼라이언스']);
        DB::table('roles')->insert(['name' => 'garage', 'display_name' => 'garage', 'description' => '정비소']);
        DB::table('roles')->insert(['name' => 'engineer', 'display_name' => 'engineer', 'description' => '엔지니어']);
        DB::table('roles')->insert(['name' => 'technician', 'display_name' => 'technician', 'description' => '기술사']);

        // 회원
        DB::table('users')->insert(['name' => 'Administrator', 'email' => 'admin@2by.kr', 'password' => bcrypt('asd#123'), 'status_cd' => 1, 'mobile' => '010-1234-1234']);
        DB::table('users')->insert(['name' => 'Daily Jude', 'email' => 'user@2by.kr', 'password' => bcrypt('asd#123'), 'status_cd' => 1, 'mobile' => '010-2345-2345']);
        DB::table('users')->insert(['name' => 'Holy Bravo', 'email' => 'bravo@2by.kr', 'password' => bcrypt('asd#123'), 'status_cd' => 1, 'mobile' => '010-3456-3456']);
        DB::table('users')->insert(['name' => 'Tailer Moon', 'email' => 'moon@2by.kr', 'password' => bcrypt('asd#123'), 'status_cd' => 1, 'mobile' => '010-456-3456']);
        DB::table('users')->insert(['name' => 'Kang Tuigeare', 'email' => 'kang@2by.kr', 'password' => bcrypt('asd#123'), 'status_cd' => 1, 'mobile' => '010-1364-1124']);
        DB::table('users')->insert(['name' => 'Mike Taison', 'email' => 'taison@2by.kr', 'password' => bcrypt('asd#123'), 'status_cd' => 1, 'mobile' => '010-1213-5674']);

        // Role
        DB::table('role_user')->insert(['user_id' => 1, 'role_id' => 1]);
        DB::table('role_user')->insert(['user_id' => 2, 'role_id' => 2]);
        DB::table('role_user')->insert(['user_id' => 3, 'role_id' => 3]);
        DB::table('role_user')->insert(['user_id' => 4, 'role_id' => 4]);
        DB::table('role_user')->insert(['user_id' => 5, 'role_id' => 5]);
        DB::table('role_user')->insert(['user_id' => 6, 'role_id' => 6]);
        
        
        
        
    }

}
