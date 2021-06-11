<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SuggestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suggestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'asset_id' => Asset::all()->random()->id,
            'geojson' => Str::random(50),
            'latitude' => $this->faker->randomFloat(5, 51, 52),
            'longitude' => $this->faker->randomFloat(5, 7, 8),
            'title' => $this->faker->text(10),
            'description' => $this->faker->text(15),
        ];
    }
}
