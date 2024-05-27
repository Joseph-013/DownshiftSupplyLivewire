<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'image' => 'product1-1.jpg',
            ],

            [
                'product_id' => 1,
                'image' => 'product1-2.jpg',
            ],

            [
                'product_id' => 1,
                'image' => 'product1-3.jpg',
            ],

            [
                'product_id' => 2,
                'image' => 'product2-1.jpg',
            ],

            [
                'product_id' => 2,
                'image' => 'product2-2.jpg',
            ],

            [
                'product_id' => 2,
                'image' => 'product2-3.jpg',
            ],

            [
                'product_id' => 3,
                'image' => 'product3-1.jpg',
            ],

            [
                'product_id' => 3,
                'image' => 'product3-2.jpg',
            ],

            [
                'product_id' => 3,
                'image' => 'product3-3.jpg',
            ],

            [
                'product_id' => 4,
                'image' => 'product4-1.jpg',
            ],

            [
                'product_id' => 4,
                'image' => 'product4-2.jpg',
            ],

            [
                'product_id' => 4,
                'image' => 'product4-3.jpg',
            ],

            [
                'product_id' => 5,
                'image' => 'product5-1.jpg',
            ],

            [
                'product_id' => 5,
                'image' => 'product5-2.jpg',
            ],

            [
                'product_id' => 5,
                'image' => 'product5-3.jpg',
            ],

            [
                'product_id' => 6,
                'image' => 'product6-1.jpg',
            ],

            [
                'product_id' => 6,
                'image' => 'product6-2.jpg',
            ],

            [
                'product_id' => 6,
                'image' => 'product6-3.jpg',
            ],

            [
                'product_id' => 7,
                'image' => 'product7-1.jpg',
            ],

            [
                'product_id' => 7,
                'image' => 'product7-2.jpg',
            ],

            [
                'product_id' => 7,
                'image' => 'product7-3.jpg',
            ],

            [
                'product_id' => 8,
                'image' => 'product8-1.jpg',
            ],

            [
                'product_id' => 8,
                'image' => 'product8-2.jpg',
            ],

            [
                'product_id' => 8,
                'image' => 'product8-3.jpg',
            ],

            [
                'product_id' => 9,
                'image' => 'product9-1.jpg',
            ],

            [
                'product_id' => 9,
                'image' => 'product9-2.jpg',
            ],

            [
                'product_id' => 9,
                'image' => 'product9-3.jpg',
            ],

            [
                'product_id' => 10,
                'image' => 'product10-1.jpg',
            ],

            [
                'product_id' => 10,
                'image' => 'product10-2.jpg',
            ],

            [
                'product_id' => 10,
                'image' => 'product10-3.jpg',
            ],
        ]);
    }
}
