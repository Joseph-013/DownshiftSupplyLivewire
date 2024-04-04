<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->insert([
            [
                'question' => 'Are items refundable?',
                'answer' => 'Items are not refundable. In a case where an item is defective, the item is to be shipped back to the shop by Downshift Supply. If an item is proven defective, it will be replaced and shipped to the customer at Downshift Supply’s expense. If the item is proven not defective, it will be returned to the customer at the customer\'s expense.',
            ],
            [
                'question' => 'Do you accept gcash payment?',
                'answer' => 'Yes. We accept GCash payment',
            ],
            [
                'question' => 'Do you install at the shop?',
                'answer' => 'Yes. We offer installations at the shop',
            ],
            [
                'question' => 'Can I pick-up my item at your shop?',
                'answer' => 'Yes. We offer pick-up method for purchased items.',
            ],
            [
                'question' => 'Where is your shop located?',
                'answer' => 'Our shop is located at 140 Cordillera Street, Santa Mesa Heights, Quezon City.',
            ],
        ]);
    }
}
