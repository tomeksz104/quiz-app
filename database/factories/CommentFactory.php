<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Comment::class;

    public function definition()
    {
        $commentable = $this->commentable();

        return [
            'user_id' => User::factory(),
            'parent_id' => null,
            'body' => fake()->text(),
            'commentable_type' => $commentable,
            'commentable_id' => $commentable::factory(),
        ];
    }

    public function commentable()
    {
        return $this->faker->randomElement([
            Quiz::class,
        ]);
    }
}
