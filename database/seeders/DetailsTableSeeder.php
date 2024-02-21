<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Create 3 for test
        DB::table('details')->insert([
            [
                'transaction_id' => 1,
                'product_id' => 1,
                'quantity' => fake()->numberBetween(1, 5),
            ],
            [
                'transaction_id' => 1,
                'product_id' => 2,
                'quantity' => fake()->numberBetween(1, 5),
            ],
            [
                'transaction_id' => 1,
                'product_id' => 3,
                'quantity' => fake()->numberBetween(1, 5),
            ],
        ]);
    }
}
