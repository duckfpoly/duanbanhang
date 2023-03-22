<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_user' => fake()->numberBetween($min = 1, $max = 5),
            'id_product' => fake()->numberBetween($min = 1, $max = 5),
            'image_product' => fake()->unique()->imageUrl($width = 640, $height = 480, 'cats'),
            'price_product' => fake()->unique()->numberBetween($min = 35000, $max = 100000),
            'quantity' => fake()->unique()->numberBetween($min = 1, $max = 99),
            'toping' => 0,
        ];
    }
}
