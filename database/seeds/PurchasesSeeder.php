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
            'transaction_id' => '1',
            'amount' => '100000',
            'type' => '1',
            'refund_name' => 'Daily Jude',
            'refund_account' => '123123123-123123',
            'refund_bank' => '국민',
            'status' => '102'
        ]);

        
    }
}