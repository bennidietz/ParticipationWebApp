<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text,
            'description' => Str::random(20),
            'content' => Str::random(50),
            'visible' => rand(0,1) == 1,
            'is_event' => rand(0,1) == 1,
            'start_time' => $this->faker->dateTimeBetween('+0 days', '+4 weeks'),
            'end_time' => $this->faker->dateTimeBetween('+4 weeks', '+4 month'),
        ];
    }
}
