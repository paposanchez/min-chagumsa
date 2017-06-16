<?php

use Illuminate\Database\Seeder;

class ApplicationVerificationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('application_verification')->delete();
        
        
        
    }
}