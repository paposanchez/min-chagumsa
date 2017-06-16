<?php

use Illuminate\Database\Seeder;

class EmailConfirmationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('email_confirmations')->delete();
        
        
        
    }
}