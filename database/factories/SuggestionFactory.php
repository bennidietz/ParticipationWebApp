<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Marker;
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
            'marker_id' => Marker::all()->random()->id,
            'geojson' => Str::random(5500),
            'latitude' => $this->faker->randomFloat(5, 51.96503984652766, 51.969645460144044),
            'longitude' => $this->faker->randomFloat(5, 7.595329284667969, 7.599277496337891),
            'altitude' => $this->faker->randomFloat(5, 40, 80),
            'tilt' => $this->faker->randomFloat(0, -90, 90),
            'rotation' => $this->faker->randomFloat(0, 0, 359),
            'title' => $this->faker->text(10),
            'visible' => rand(0,1) == 1,
            'description' => $this->faker->text(15),
        ];
    }
}
