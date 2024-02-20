<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            // [
            //     'name' => 'testproduct q:0',
            //     'price' => '69696969',
            //     'stockquantity' => 0,
            //     'criticallevel' => 5,
            //     'image' => 'https://assets.newatlas.com/dims4/default/74c9a2a/2147483647/strip/true/crop/2000x1125+0+188/resize/1200x675!/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2Fdb%2Fe5%2Ffe59c7c24f15884adbdc3ec8304d%2Fgears.jpg',
            // ],
        ]);
    }
}
