<?php

namespace Database\Factories;

use App\Models\QuizType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuizTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = QuizType::class;

    public function definition()
    {
        return [
            'title' => fake()->sentence(1),
            'slug' => fake()->slug(),
            'description' => fake()->text(),
            'color' => fake()->colorName(),
        ];
    }
}
