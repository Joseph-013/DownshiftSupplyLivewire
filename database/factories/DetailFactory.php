<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $transId = 0;
    public function definition(): array
    {
        // $createdAt = Carbon::createFromTimestamp(rand(Carbon::create(2020, 1, 1)->timestamp, Carbon::create(2024, 12, 31)->timestamp));
        $createdAt = Carbon::createFromTimestamp(rand(Carbon::create(2020, 1, 1)->timestamp, Carbon::now()->timestamp));

        ++$this->transId;
        return [
            // 'user_id' => fake()->randomNumber(2, false),
            // 'recipientName' => fake()->name(),
            // 'contact' => fake()->randomNumber(9, false),
            // 'preferredService' => fake()->randomElement(['Delivery', 'Pickup']),
            // 'shippingAddress' => fake()->address,
            // 'paymentOption' => fake()->creditCardType(),
            // 'proofOfPayment' => fake()->imageUrl(640, 480, 'payment', true),
            // 'purchaseDate' => now(),
            // 'status' => fake()->randomElement(['Complete', 'On Hold', 'Processing', 'In Transit', 'Ready for Pickup', 'Returned', 'Cancelled']),
            // 'grandTotal' => fake()->randomNumber(4, false),
            // 'trackingNumber' => fake()->randomNumber(3, false),
            // 'shippingFee' => fake()->randomNumber(3, false)
            'created_at' => $createdAt,
            'transaction_id' => fake()->numberBetween(1, 50),
            'product_id' => fake()->numberBetween(1, 50),
            'quantity' => fake()->numberBetween(1, 5),
            'subtotal' => fake()->numberBetween(1000, 100000),
        ];
    }
}
