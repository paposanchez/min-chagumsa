<?php

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchases')->delete();
        
        \DB::table('purchases')->insert(array (
            0 => 
            array (
                'id' => 1,
                'transaction_id' => '1',
                'amount' => 100000,
                'type' => '1',
                'refund_name' => 'Daily Jude',
                'refund_account' => '123123123-123123',
                'refund_bank' => '국민',
                'status_cd' => 102,
                'created_at' => '2017-06-09 16:00:57',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}