<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@2by.kr',
                'password' => '$2y$10$uGnBBhN7Pk3V763jLJrVeu7GgYA92ljd2rU9jfCr/5.ahwpE9a0jm',
                'remember_token' => NULL,
                'mobile' => '010-1234-1234',
                'avatar' => NULL,
                'status_cd' => 1,
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Daily Jude',
                'email' => 'user@2by.kr',
                'password' => '$2y$10$Dcw0xRJ/N8KrJ4LVRiLir.nU/d5dLH.4WDwNOM.wGdj.i3flbx.KC',
                'remember_token' => NULL,
                'mobile' => '010-2345-2345',
                'avatar' => NULL,
                'status_cd' => 1,
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Holy Bravo',
                'email' => 'bravo@2by.kr',
                'password' => '$2y$10$FM/jeAEienfMpLC/D18O4O/Es.31titwoPkPA9LmBtFlQ6PTztTuy',
                'remember_token' => NULL,
                'mobile' => '010-3456-3456',
                'avatar' => NULL,
                'status_cd' => 1,
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Tailer Moon',
                'email' => 'moon@2by.kr',
                'password' => '$2y$10$BpctBqCNai6/u7c8mR1t2uVDOpDzLECrhk9JMMC7AKxmi7gdrB3pS',
                'remember_token' => NULL,
                'mobile' => '010-456-3456',
                'avatar' => NULL,
                'status_cd' => 1,
                'created_at' => '2017-06-01 22:55:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Kang Tuigeare',
                'email' => 'kang@2by.kr',
                'password' => '$2y$10$z0knet6F.zGygzcqmYkX3eLJeuAucryOmbnyR6sIzn2c1CAwtnIaK',
                'remember_token' => NULL,
                'mobile' => '010-1364-1124',
                'avatar' => 1,
                'status_cd' => 1,
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => '2017-06-14 07:33:40',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Mike Taison',
                'email' => 'taison@2by.kr',
                'password' => '$2y$10$9GKiz3wutISW3zea.gFDSe/jJJWEpCVA53bo.p/SN02nTzP2aSjd6',
                'remember_token' => NULL,
                'mobile' => '010-1213-5674',
                'avatar' => NULL,
                'status_cd' => 1,
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}