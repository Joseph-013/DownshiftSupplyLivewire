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
        DB::table('details')->insert([
            [
                'transaction_id' => 1,
                'product_id' => 1,
                'quantity' => 3,
                'subtotal' => 50000
            ],
            [
                'transaction_id' => 1,
                'product_id' => 2,
                'quantity' => 4,
                'subtotal' => 20000
            ],
            [
                'transaction_id' => 1,
                'product_id' => 3,
                'quantity' => 3,
                'subtotal' => 10000
            ]
        ]);
    }
}
