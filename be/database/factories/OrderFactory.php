<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_code' => fake()->numberBetween($min = 1000, $max = 9000),
            'order_date' => fake()->dateTime($max = 'now', $timezone = null),
            'pay_method' => 0,
            'pay_status' => 0,
            'id_user' => fake()->numberBetween($min = 1, $max = 5),
            'id_product' => fake()->numberBetween($min = 1, $max = 5),
            'price_product' => fake()->numberBetween($min = 35000, $max = 100000),
            'quantity' => fake()->numberBetween($min = 1, $max = 99),
            'toping' => 0,
            'status' => 0,
        ];
    }
}
