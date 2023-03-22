<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_user' => fake()->numberBetween($min = 1, $max = 5),
            'id_product' => fake()->numberBetween($min = 1, $max = 5),
            'rate_star' => fake()->numberBetween($min = 1, $max = 5),
            'content' => fake()->text($maxNbChars = 200),
            'rate_at' => fake()->dateTime($max = 'now', $timezone = null),
            'status' => 0,
        ];
    }
}
