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
            'criticallevel' => fake()->randomNumber(1, false),
            'image' => fake()->randomElement(
                [
                    'https://scontent.fmnl30-1.fna.fbcdn.net/v/t39.30808-6/422956377_753669346808279_364496498929377796_n.jpg?stp=dst-jpg_s640x640&_nc_cat=103&ccb=1-7&_nc_sid=dd5e9f&_nc_eui2=AeFucZNahCSK4ncmm3CbGPByxiWM7IzwJorGJYzsjPAmipG33rRX-mhVz-unNxyeFHeNmk4pOfcillmKhtosM_OA&_nc_ohc=Wjg3DIeVCRkAX-OFxUc&_nc_ht=scontent.fmnl30-1.fna&oh=00_AfApJT78fdN_DPa4Lj4iNZRycSjFopM-Do3z1eV051dYvA&oe=65C499BB',
                    'https://scontent.fmnl30-3.fna.fbcdn.net/v/t39.30808-6/422949457_753668253475055_7693119476437196925_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=dd5e9f&_nc_eui2=AeHOwJLyqhloHGzOMmz6rNvztKtnICeX25-0q2cgJ5fbn6nGjjgiBhN5MjraFgF-Rl3XG944lfR22KrDEbg2pcLx&_nc_ohc=a0vvG16p8fYAX_eSHEk&_nc_ht=scontent.fmnl30-3.fna&oh=00_AfCN4IcmTV86Dy-t_2uO8hNgDVgLR5pRORcvvy35mTDLJw&oe=65C442E6',
                    'https://scontent-mnl1-1.xx.fbcdn.net/v/t39.30808-6/422951872_753666973475183_8525706975758778671_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=dd5e9f&_nc_eui2=AeHaY19_oiWCcDQDJr_IU9XK97k9liv7jo_3uT2WK_uOj9mUdzUFhey0m6G8F03H2yf2Zkpx-t3GIUim2eWnXswj&_nc_ohc=dJVgHnA8-_YAX8FwQOA&_nc_ht=scontent-mnl1-1.xx&oh=00_AfDQSAoiNN9icVIykJxVSNfV6eIgb3nxN0JAq5d5FFUXVA&oe=65C4A72F',
                    'https://scontent.fmnl30-1.fna.fbcdn.net/v/t39.30808-6/423004116_753666296808584_1517084071284249972_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=dd5e9f&_nc_eui2=AeH-zctHXFf39rzTGn815wgQ03vrl1r5mtjTe-uXWvma2KxQgRB6DRXwkptRMHIVlrlvtTB0e0eWt6f-aASNnbYb&_nc_ohc=HP0kcMWJj40AX9IDzZe&_nc_ht=scontent.fmnl30-1.fna&oh=00_AfBv30H2-EPJjK8n9yO49zGDGkAxBG2gA8cwT45BRmiKyw&oe=65C49989',
                ]),
        ];
    }
}
