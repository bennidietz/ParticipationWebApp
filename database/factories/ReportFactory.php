<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Report;
use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (rand(0,1) == 1) {
            return [
                'asset_id' => Comment::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'description' => $this->faker->text(40),
            ];
        } else {
            return [
                'suggestion_id' => Suggestion::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'description' => $this->faker->text(40),
            ];
        }
    }
}
