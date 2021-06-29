<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (rand(0,1) == 1)
        {
            return [
                'name' => $this->faker->text,
                'file_path' => $this->faker->filePath(),
                'visible' => rand(0,1) == 1,
                'type' => $this->faker->randomElement(Asset::enum),
            ];
        } else {
            return [
                'name' => $this->faker->text,
                'object' => Str::random(150),
                'visible' => rand(0,1) == 1,
                'type' => $this->faker->randomElement(Asset::enum),
            ];
        }
    }
}
