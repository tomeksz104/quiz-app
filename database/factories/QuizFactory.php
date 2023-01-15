<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\QuizType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'quiz_type' => QuizType::factory(),
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'description' => fake()->text(),
            'time_for_answer' => fake()->numberBetween(5,30),
            'status' => fake()->randomElement(['pending', 'approved']),
            'public' => fake()->numberBetween(0,1),
            'views' => fake()->numberBetween(1,500),
            'votes' => fake()->numberBetween(1,500),
        ];
    }
}
