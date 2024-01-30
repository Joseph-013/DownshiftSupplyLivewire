<?php

namespace Database\Factories;

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
        return [
            'order_id' => fake()->randomNumber(3, false),
            'product_id' => fake()->randomNumber(3, false),
            'quantity' => fake()->randomNumber(2, false),
            'subtotal' => fake()->randomNumber(4, false)
        ];
    }
}
