<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(2, false),
            'recipientName' => fake()->name(),
            'contact' => fake()->randomNumber(9, false),
            'preferredService' => fake()->randomElement(['Delivery', 'Pickup']),
            'shippingAddress' => fake()->address,
            'paymentOption' => fake()->creditCardType(),
            'proofOfPayment' => fake()->imageUrl(640, 480, 'payment', true),
            'purchaseDate' => now(),
            'status' => fake()->randomElement(['Complete', 'On Hold', 'Processing', 'In Transit', 'Ready for Pickup', 'Returned', 'Cancelled']),
            'grandTotal' => fake()->randomNumber(4, false),
            'trackingNumber' => fake()->randomNumber(3, false),
            'shippingFee' => fake()->randomNumber(3, false)
        ];
    }
}
