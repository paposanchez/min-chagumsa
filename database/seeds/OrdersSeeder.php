<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 4. 19.
 * Time: PM 2:19
 */
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run(){
        DB::table('orders')->insert([
            'datekey' => '170101',
            'car_number' => '12가2122',
            'car_id' => '1',
            'garage_id' => '1',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '10',
            'technist_id' => '20',
            'orderer_id' => '1',
            'orderer_name' => '홍길동',
            'orderer_mobile' => '010-1234-1234',
            'registration_file_cd' => '3',
            'mileage' => '100000',
            'open_cd' => '1',
            'verification_id' => '1',
            'status_cd' => '102'
        ]);

        DB::table('orders')->insert([
            'datekey' => '170102',
            'car_number' => '12가3333',
            'car_id' => '2',
            'garage_id' => '1',
            'item_id' => '2',
            'purchase_id' => '2',
            'engineer_id' => '10',
            'technist_id' => '20',
            'orderer_id' => '2',
            'orderer_name' => '홍길순',
            'orderer_mobile' => '010-2345-2345',
            'registration_file_cd' => '3',
            'mileage' => '150000',
            'open_cd' => '1',
            'verification_id' => '1',
            'status_cd' => '103'
        ]);



    }

}