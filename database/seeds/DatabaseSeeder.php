<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

//        $this->call(BoardsSeeder::class);
        $this->call(CodesSeeder::class);
//        $this->call(UsersSeeder::class);
//        $this->call(PostsSeeder::class);
//        $this->call(OrdersSeeder::class);

        return;
    }

}
