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
                'type' => $this->faker->randomElement(['image','asset','3D_asset']),
            ];
        } else {
            return [
                'name' => $this->faker->text,
                'object' => Str::random(150),
                'type' => $this->faker->randomElement(['image','asset','3D_asset']),
            ];
        }
    }
}