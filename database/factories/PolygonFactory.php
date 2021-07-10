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
        $lat = $this->faker->randomFloat(5, 51.96503984652766, 51.96749888077175);
        $long = $this->faker->randomFloat(5, 7.595329284667969, 7.599277496337891);
        $secondLat = $this->faker->randomFloat(5, -0.001, 0.001) + $lat;
        $secondLong = $this->faker->randomFloat(5, -0.001, 0.001) + $long;
        $latString = sprintf("%.5f", $lat);
        $longString = sprintf("%.5f", $long);
        $secondLatString = sprintf("%.5f", $secondLat);
        $secondLongString = sprintf("%.5f", $secondLong);
        $pointString = $longString . ", " . $latString;
        return [
            'name' => $this->faker->text( 10),
            'geojson' => '{
              "type": "FeatureCollection",
              "features": [
                {
                  "type": "Feature",
                  "properties": {},
                  "geometry": {
                    "type": "Polygon",
                    "coordinates": [
                      [
                        [
                          ' . $pointString. '
                        ],
                        [
                          ' . $secondLongString . ',
                          ' . $latString. '
                        ],
                        [
                          ' . $secondLongString . ',
                          ' . $secondLatString. '
                        ],
                        [
                          ' . $longString . ',
                          ' . $secondLatString . '
                        ],
                        [
                          ' . $pointString . '
                        ]
                      ]
                    ]
                  }
                }
              ]
            }',
            'visible' => rand(0,1) == 1,
            'state' => $this->faker->randomElement(['free','planned','unknown']),
            'description' => $this->faker->text(30),
        ];
    }
}
