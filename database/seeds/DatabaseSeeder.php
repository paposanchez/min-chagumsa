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
//        $this->call(CodesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PostsSeeder::class);

        //  주문관련 Seeder
//        $this->call(BrandsSeeder::class);
//        $this->call(ModelsSeeder::class);
//        $this->call(DetailsSeeder::class);
//        $this->call(CarsSeeder::class);
//        $this->call(ItemsSeeder::class);
//        $this->call(PurchasesSeeder::class);
//        $this->call(OrdersSeeder::class);

        return;
    }

}
