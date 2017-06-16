<?php

use Illuminate\Database\Seeder;

class UnsubscribeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('unsubscribe')->delete();
        
        
        
    }
}