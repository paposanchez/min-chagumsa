<?php

use Illuminate\Database\Seeder;

class BcsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // 20
        DB::table('users')->insert([
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
            ['name' => '', 'email' => '', 'password' => bcrypt(), 'mobile' => '', 'status_cd' => '1'],
        ]);


        DB::table('role_user')->insert([
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => ''],
            ['user_id' => '', 'role_id' => '']
        ]);

        DB::table('user_extras')->insert([
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => ''],
            ['users_id' => '', 'phone' => '', 'address' => '', 'address_extra' => '', 'aliance_id' => '']
        ]);

        DB::table('garage_infos')->insert([
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => ''],
            ['garage_id' => '', 'name' => '', 'tel' => '', 'area' => '', 'section' => '', 'address' => '']
        ]);
    }

}
