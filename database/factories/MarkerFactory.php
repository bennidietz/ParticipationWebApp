<?php

namespace Database\Factories;

use App\Models\Marker;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Marker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'visible' => rand(0,1) == 1,
            'latitude' => $this->faker->randomFloat(5, 51.96503984652766, 51.969645460144044),
            'longitude' => $this->faker->randomFloat(5, 7.595329284667969, 7.599277496337891),
        ];
    }
}
