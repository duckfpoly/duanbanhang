<?php

namespace Database\Factories;

use Faker\Core\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_product'  => fake()->name(),
            'image_product' => fake()->unique()->imageUrl($width = 640, $height = 480, 'cats'),
            'image_product_2' => fake()->unique()->imageUrl($width = 640, $height = 480, 'cats'),
            'image_product_3' => fake()->unique()->imageUrl($width = 640, $height = 480, 'cats'),
            'price_product' => fake()->unique()->randomNumber(),
            'desc_sort' => fake()->unique()->text,
            'desc' => fake()->unique()->text,
            'created_by' => fake()->unique()->firstName(),
            'updated_by' => fake()->unique()->firstName(),
            'status' => 0,
            'created_at' => fake()->unixTime,
            'updated_at' => fake()->unixTime,
            'id_category' => fake()->numberBetween($min = 1, $max = 5),
        ];
    }
}
