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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UsersTableSeeder::class);
        // \App\Models\User::factory(5)->create();

        $this->call(ProductsTableSeeder::class);
        // \App\Models\Product::factory(20)->create();

        // $this->call(FAQsTableSeeder::class);
        // \App\Models\FAQ::factory(5)->create();

        // $this->call(CartsTableSeeder::class);
        // \App\Models\Cart::factory(5)->create();

        $this->call(DetailsTableSeeder::class);
        // \App\Models\Detail::factory(5)->create();

        $this->call(TransactionsTableSeeder::class);
        // \App\Models\Transaction::factory(5)->create();
    }
}
