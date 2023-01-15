<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(1),
            'description' => fake()->text(),
            'slug' => fake()->slug(),
            'color' => fake()->colorName(),
            'views' => fake()->randomNumber(),
        ];
    }
}
