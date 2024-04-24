<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Development:

        $this->call(UsersTableSeeder::class);
        \App\Models\User::factory(18)->create();

        // $this->call(ProductsTableSeeder::class);
        \App\Models\Product::factory(500)->create();

        // $this->call(FAQsTableSeeder::class);
        \App\Models\FAQ::factory(20)->create();

        // $this->call(CartsTableSeeder::class);
        \App\Models\Cart::factory(100)->create();

        \App\Models\Detail::factory(1000)->create();
        // \App\Models\Detail::factory(150)->create();
        // $this->call(DetailsTableSeeder::class);

        // $this->call(TransactionsTableSeeder::class);
        // \App\Models\Transaction::factory(50)->create();
        \App\Models\Transaction::factory(500)->create();





        // Deployment:

        // $this->call(UsersTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        // $this->call(FAQsTableSeeder::class);



        // Combination

        // $this->call(UsersTableSeeder::class);
        // \App\Models\User::factory(18)->create();

        // // $this->call(ProductsTableSeeder::class);
        // \App\Models\Product::factory(500)->create();

        // // $this->call(FAQsTableSeeder::class);
        // \App\Models\FAQ::factory(20)->create();

        // // $this->call(CartsTableSeeder::class);
        // \App\Models\Cart::factory(100)->create();

        // \App\Models\Detail::factory(150)->create();
        // // $this->call(DetailsTableSeeder::class);

        // // $this->call(TransactionsTableSeeder::class);
        // // \App\Models\Transaction::factory(50)->create();
        // \App\Models\Transaction::factory(500)->create();
    }
}
