<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(5),
            'price' => fake()->randomNumber(6, false),
            'stockquantity' => fake()->randomNumber(2, false),
            'image' => fake()->imageUrl(640, 480, 'products', true)
        ];
    }
}
