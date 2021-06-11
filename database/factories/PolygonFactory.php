<?php

namespace Database\Factories;

use App\Models\Polygon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PolygonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Polygon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text( 10),
            'geojson' => Str::random(50),
            'state' => $this->faker->randomElement(['free','planned','unknown']),
            'description' => $this->faker->text(30),
        ];
    }
}
