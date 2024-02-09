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
            // 'name' => fake()->sentence(5),
            // 'price' => fake()->randomNumber(6, false),
            // 'stockquantity' => fake()->randomNumber(2, false),
            // 'criticallevel' => fake()->randomNumber(1, false),
            // 'image' => fake()->randomElement(
            //     [
            //         'https://media.wired.com/photos/64f7c231542c5d0935dca057/16:9/w_2400,h_1350,c_limit/Lamborghini-Lanzador-Drive-Featured-Gear.jpg',
            //         'https://hips.hearstapps.com/hmg-prod/amv-prod-cad-assets/images/13q1/499735/2013-mazda-cx-9-awd-photo-506952-s-986x603.jpg?fill=16:9&resize=1200:*',
            //         'https://www.motortrend.com/uploads/sites/11/2013/06/2013-Chevrolet-Traverse-AWD-2LT-vs-2013-Mazda-CX-9-front-view.jpg?fit=around%7C875:492',
            //         'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTmoFWjzBZOIthdcYyJr3A53_kDSnlBBLDQ6d5dCu3j80jkWt_O37Gbtv71sGcgadjTIk&usqp=CAU',
            //     ]),
        ];
    }
}
