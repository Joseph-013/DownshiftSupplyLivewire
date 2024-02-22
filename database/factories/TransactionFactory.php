<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $purchaseType = $this->faker->randomElement(['Onsite', 'Online']);
        $grandTotal = 0;

        // 'order_id' => fake()->randomNumber(3, false),
        // 'product_id' => fake()->randomNumber(3, false),
        // 'quantity' => fake()->randomNumber(2, false),
        // 'subtotal' => fake()->randomNumber(4, false)

        if ($purchaseType === 'Onsite') {
            return [
                'firstName' => fake()->firstName,
                'lastName' => fake()->lastName,
                'contact' => fake()->numberBetween(9000000000, 9999999999),
                'purchaseType' => $purchaseType,
                'user_id' => fake()->numberBetween(2, 20),
            ];
        } else if ($purchaseType === 'Online') {
            $products = Product::inRandomOrder()->limit(3)->get();
            $totalPrice = $products->sum('price');
            return [
                'firstName' => fake()->firstName,
                'lastName' => fake()->lastName,
                'contact' => fake()->numberBetween(900000000, 9999999999),
                'purchaseType' => $purchaseType,
                'user_id' => fake()->numberBetween(2, 20),
                'preferredService' => fake()->randomElement(['Delivery', 'Pickup']),
                'paymentOption' => fake()->sentence(1),
                'proofOfPayment' => fake()->url(),
                'status' => fake()->randomElement(['Complete', 'On Hold', 'Processing', 'In Transit', 'Ready for Pickup', 'Returned', 'Cancelled']),
                'shippingAddress' => fake()->address(),
                'courierUsed' => fake()->sentence(2),
                'shippingFee' => fake()->randomNumber(4, false),
                'trackingNumber' => fake()->regexify('[A-Za-z0-9]{10}'),
                'grandTotal' => $totalPrice,
            ];
        }
    }
}
