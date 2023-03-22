<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_blog' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'image_blog' => fake()->unique()->imageUrl($width = 640, $height = 480, 'cats'),
            'content_blog' => fake()->text($maxNbChars = 200) ,
            'create_by' => fake()->firstNameFemale,
            'updated_by' => fake()->firstNameMale,
            'status' => 0,
        ];
    }
}
