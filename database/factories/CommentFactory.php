<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'suggestion_id' => Suggestion::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'visible' => rand(0,1) == 1,
            'message' => $this->faker->text(40),
        ];
    }
}
