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
                'answer' => '"Items are non-refundable. In instances where an item is found to be defective, Downshift Supply will handle the return shipping. Should the item be confirmed as defective, a replacement will be sent to the customer at no additional charge by Downshift Supply. Conversely, if the item is not defective, it will be sent back to the customer, who will bear the shipping costs. The item will be returned using the delivery method initially selected during the purchase. If you wish to alter this service (either to delivery or pick-up) for the return of the item, please reach out directly to the owner. Furthermore, it is essential to email the owner when sending back the item or for any communications pertaining to item returns."',
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
            [
                'question' => 'Where is your shop located?',
                'answer' => 'Our shop is located at 140 Cordillera Street, Santa Mesa Heights, Quezon City.',
            ],
        ]);
    }
}
