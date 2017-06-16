<?php

use Illuminate\Database\Seeder;

class VerificationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('verification')->delete();
        
        
        
    }
}