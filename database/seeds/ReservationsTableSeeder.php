<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reservations')->delete();
        
        \DB::table('reservations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'orders_id' => 1,
                'garage_id' => 4,
                'reservation_at' => '2017-06-14 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => NULL,
                'updated_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'orders_id' => 2,
                'garage_id' => 4,
                'reservation_at' => '2017-06-16 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'orders_id' => 3,
                'garage_id' => 4,
                'reservation_at' => '2017-06-19 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-12 12:24:53',
                'updated_id' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'orders_id' => 4,
                'garage_id' => 4,
                'reservation_at' => '2017-06-21 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'orders_id' => 5,
                'garage_id' => 4,
                'reservation_at' => '2017-06-23 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'orders_id' => 6,
                'garage_id' => 4,
                'reservation_at' => '2017-06-25 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'orders_id' => 7,
                'garage_id' => 4,
                'reservation_at' => '2017-06-27 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'orders_id' => 8,
                'garage_id' => 4,
                'reservation_at' => '2017-06-29 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'orders_id' => 9,
                'garage_id' => 4,
                'reservation_at' => '2017-07-01 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'orders_id' => 10,
                'garage_id' => 4,
                'reservation_at' => '2017-07-03 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'orders_id' => 11,
                'garage_id' => 4,
                'reservation_at' => '2017-07-05 13:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'orders_id' => 12,
                'garage_id' => 4,
                'reservation_at' => '2017-06-14 15:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'orders_id' => 13,
                'garage_id' => 4,
                'reservation_at' => '2017-06-14 17:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'orders_id' => 14,
                'garage_id' => 4,
                'reservation_at' => '2017-06-16 15:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'orders_id' => 1,
                'garage_id' => 4,
                'reservation_at' => '2017-06-14 08:00:00',
                'created_at' => '2017-06-12 11:47:44',
                'created_id' => 2,
                'updated_at' => NULL,
                'updated_id' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'orders_id' => 1,
                'garage_id' => 4,
                'reservation_at' => '2017-06-16 15:00:00',
                'created_at' => '2017-06-12 11:47:44',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'orders_id' => 10,
                'garage_id' => 4,
                'reservation_at' => '2017-06-19 18:00:00',
                'created_at' => '2017-06-12 11:30:05',
                'created_id' => 2,
                'updated_at' => '2017-06-13 23:09:59',
                'updated_id' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'orders_id' => 1,
                'garage_id' => 4,
                'reservation_at' => '2017-06-18 15:00:00',
                'created_at' => '2017-06-12 11:47:44',
                'created_id' => 2,
                'updated_at' => NULL,
                'updated_id' => NULL,
            ),
        ));
        
        
    }
}