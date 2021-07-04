<?php

namespace Database\Factories;

use App\Models\Asset;
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
        $rand = rand(0,2);
        if ($rand == 1) {
            return [
                'asset_id' => Asset::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'description' => $this->faker->text(40),
            ];
        } else if ($rand == 2) {
            return [
                'suggestion_id' => Suggestion::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'description' => $this->faker->text(40),
            ];
        } else {
            return [
                'comment_id' => Comment::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'description' => $this->faker->text(40),
            ];
        }
    }
}
