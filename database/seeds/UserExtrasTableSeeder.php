<?php

use Illuminate\Database\Seeder;

class UserExtrasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_extras')->delete();
        
        \DB::table('user_extras')->insert(array (
            0 => 
            array (
                'users_id' => 4,
                'registration_number' => NULL,
                'engineer_number' => NULL,
                'phone' => '02-0922-0293',
                'fax' => '02-0922-0294',
                'zipcode' => '29202',
                'address' => '경기도 일산 서구 장항동 웨스턴타워 1차',
                'address_extra' => '605호',
                'aliance_id' => 3,
                'garage_id' => NULL,
                'created_at' => '2017-05-25 17:06:36',
                'updated_at' => '2017-06-09 18:51:14',
            ),
            1 => 
            array (
                'users_id' => 5,
                'registration_number' => NULL,
                'engineer_number' => NULL,
                'phone' => '02-0922-2099',
                'fax' => '02-0922-9090',
                'zipcode' => '19287',
                'address' => '경기도 일산 서구 장항동 웨스턴타워 1차',
                'address_extra' => '605호',
                'aliance_id' => NULL,
                'garage_id' => 4,
                'created_at' => '2017-05-25 17:06:36',
                'updated_at' => '2017-06-09 18:51:14',
            ),
        ));
        
        
    }
}