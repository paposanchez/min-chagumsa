<?php

use Illuminate\Database\Seeder;

class UserSequencesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_sequences')->delete();
        
        \DB::table('user_sequences')->insert(array (
            0 => 
            array (
                'users_id' => 1,
                'seq' => 1,
                'garage_seq' => 1,
                'logined_at' => NULL,
            ),
            1 => 
            array (
                'users_id' => 2,
                'seq' => 2,
                'garage_seq' => 1,
                'logined_at' => NULL,
            ),
            2 => 
            array (
                'users_id' => 3,
                'seq' => 1,
                'garage_seq' => 2,
                'logined_at' => NULL,
            ),
            3 => 
            array (
                'users_id' => 4,
                'seq' => 3,
                'garage_seq' => 1,
                'logined_at' => NULL,
            ),
            4 => 
            array (
                'users_id' => 5,
                'seq' => 4,
                'garage_seq' => 1,
                'logined_at' => NULL,
            ),
            5 => 
            array (
                'users_id' => 6,
                'seq' => 1,
                'garage_seq' => 3,
                'logined_at' => NULL,
            ),
        ));
        
        
    }
}