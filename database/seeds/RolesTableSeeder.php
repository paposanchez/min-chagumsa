<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => '관리자',
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'member',
                'display_name' => 'Member',
                'description' => '일반회원',
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'alience',
                'display_name' => 'alience',
                'description' => '얼라이언스',
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'garage',
                'display_name' => 'garage',
                'description' => '정비소',
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'engineer',
                'display_name' => 'engineer',
                'description' => '엔지니어',
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'technician',
                'display_name' => 'technician',
                'description' => '기술사',
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}