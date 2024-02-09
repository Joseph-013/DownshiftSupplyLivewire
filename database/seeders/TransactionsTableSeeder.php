<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'firstName' => 'Justin',
                'lastName' => 'Valdecanas',
                'contact' => 9053942636,
                'purchaseType' => 'Onsite',
                'grandTotal' => 100000
            ],
            [
                'firstName' => 'J',
                'lastName' => 'V',
                'contact' => 9053942636,
                'purchaseType' => 'Onsite',
                'grandTotal' => 100000
            ]
        ]);
    }
}
