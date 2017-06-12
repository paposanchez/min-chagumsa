<?php

use Illuminate\Database\Seeder;

class ReservationsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('reservations')->insert([
            ['id' => '1', 'orders_id' => '1', 'garage_id' => '4', 'reservation_at' => '2017-06-10', 'created_id' => '2'],
            ['id' => '2', 'orders_id' => '2', 'garage_id' => '4', 'reservation_at' => '2017-06-11', 'created_id' => '2'],
            ['id' => '3', 'orders_id' => '3', 'garage_id' => '4', 'reservation_at' => '2017-06-12', 'created_id' => '2'],
            ['id' => '4', 'orders_id' => '4', 'garage_id' => '4', 'reservation_at' => '2017-06-13', 'created_id' => '2'],
            ['id' => '5', 'orders_id' => '5', 'garage_id' => '4', 'reservation_at' => '2017-06-14', 'created_id' => '2'],
            ['id' => '6', 'orders_id' => '6', 'garage_id' => '4', 'reservation_at' => '2017-06-15', 'created_id' => '2'],
            ['id' => '7', 'orders_id' => '7', 'garage_id' => '4', 'reservation_at' => '2017-06-16', 'created_id' => '2'],
            ['id' => '8', 'orders_id' => '8', 'garage_id' => '4', 'reservation_at' => '2017-06-17', 'created_id' => '2'],
            ['id' => '9', 'orders_id' => '9', 'garage_id' => '4', 'reservation_at' => '2017-06-18', 'created_id' => '2'],
            ['id' => '10', 'orders_id' => '10', 'garage_id' => '4', 'reservation_at' => '2017-06-19', 'created_id' => '2'],
            ['id' => '11', 'orders_id' => '11', 'garage_id' => '4', 'reservation_at' => '2017-06-20', 'created_id' => '2'],
            ['id' => '12', 'orders_id' => '12', 'garage_id' => '4', 'reservation_at' => '2017-06-21', 'created_id' => '2'],
            ['id' => '13', 'orders_id' => '13', 'garage_id' => '4', 'reservation_at' => '2017-06-22', 'created_id' => '2'],
            ['id' => '14', 'orders_id' => '14', 'garage_id' => '4', 'reservation_at' => '2017-06-23', 'created_id' => '2']
        ]);
    }

}

