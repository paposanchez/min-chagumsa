<?php

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 29.
 * Time: PM 6:01
 */
class PurchasesSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        DB::table('purchases')->insert([
            'transaction_id' => '11',
            'amount' => '100000',
            'type' => '3',
            'refund_name' => '홍길동',
            'refund_account' => '123123123-123123',
            'refund_bank' => '국민',
            'status' => '1'
        ]);

        DB::table('purchases')->insert([
            'transaction_id' => '13',
            'amount' => '200000',
            'type' => '3',
            'refund_name' => '홍길순',
            'refund_account' => '234234234-234234',
            'refund_bank' => '농협',
            'status' => '3'
        ]);
    }
}