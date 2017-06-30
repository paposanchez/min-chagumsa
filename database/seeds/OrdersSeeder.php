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
        // 입고대기 총 5일
        // 170607
        DB::table('orders') -> insert([
            'datekey' => '170607',
            'car_number' => '11가1111',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태

        ]);

        DB::table('orders') -> insert([
            'datekey' => '170607',
            'car_number' => '12나2222',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        // 170608
        DB::table('orders') -> insert([
            'datekey' => '170608',
            'car_number' => '21가1111',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        DB::table('orders') -> insert([
            'datekey' => '170608',
            'car_number' => '22나2222',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        // 170609
        DB::table('orders') -> insert([
            'datekey' => '170609',
            'car_number' => '31가1111',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        DB::table('orders') -> insert([
            'datekey' => '170609',
            'car_number' => '32나2222',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        // 170610
        DB::table('orders') -> insert([
            'datekey' => '170610',
            'car_number' => '41가1111',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        DB::table('orders') -> insert([
            'datekey' => '170610',
            'car_number' => '42나2222',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        // 170611

        DB::table('orders') -> insert([
            'datekey' => '170611',
            'car_number' => '51가1111',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        DB::table('orders') -> insert([
            'datekey' => '170611',
            'car_number' => '51나2222',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        // 입고대기 총 5일치


        // 각 상태별 진단 관련 주문
        // 입고
        DB::table('orders') -> insert([
            'datekey' => '170607',
            'car_number' => '61다6666',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '105' //주문상태
        ]);
        DB::table('orders') -> insert([
            'datekey' => '170607',
            'car_number' => '62다7777',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '105' //주문상태
        ]);
        // 진단중
        DB::table('orders') -> insert([
            'datekey' => '170608',
            'car_number' => '71라7777',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        DB::table('orders') -> insert([
            'datekey' => '170608',
            'car_number' => '72라8888',
            'car_id' => '1',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        // 진단완료
        DB::table('orders') -> insert([
            'datekey' => '170609',
            'car_number' => '81마8888',
            'car_id' => '4',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        DB::table('orders') -> insert([
            'datekey' => '170609',
            'car_number' => '82마999',
            'car_id' => '4',
            'garage_id' => '4',
            'item_id' => '1',
            'purchase_id' => '1',
            'engineer_id' => '5',
            'technist_id' => '6',
            'orderer_id' => '2',
            'orderer_name' => 'Daily Jude',
            'orderer_mobile' => '010-2345-2345',
            'registration_file' => 0,
            'mileage' => '100000',
            'open_cd' => '3',
            'status_cd' => '104' //주문상태
        ]);
        // 각 상태별 진단 관련 주문

    }

}


