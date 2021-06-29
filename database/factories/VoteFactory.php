<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Suggestion;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (rand(0,1) == 1) {
            return [
                'comment_id' => Comment::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'is_positive' => rand(0,1) == 1,
            ];
        } else {
            return [
                'suggestion_id' => Suggestion::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'is_positive' => rand(0,1) == 1,
            ];
        }
    }
}
