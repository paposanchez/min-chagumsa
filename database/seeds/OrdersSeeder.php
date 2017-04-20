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
        DB::table('orders')->insert(['status_cd' => '1', 'orderer_name' => '홍길동', 'orderer_mobile' => '010-1234-1234', 'garage_id' => '1', 'engineer_id' => '1', 'technist_id' => '1']);
        DB::table('orders')->insert(['status_cd' => '2', 'orderer_name' => '홍길순', 'orderer_mobile' => '010-2345-2345', 'garage_id' => '2', 'engineer_id' => '2', 'technist_id' => '2']);
    }

}