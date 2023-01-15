<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Answers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answers>
 */
class AnswersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Answers::class;

    public function definition()
    {
        return [
            'title' => fake()->sentence(1),
            'correct' => fake()->numberBetween(0,1),
            'question_id' => Question::factory(),
            'result_message_id' => null,
        ];
    }
}
