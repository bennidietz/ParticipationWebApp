<?php

namespace Database\Seeders;

use App\Models\Polygon;
use Illuminate\Database\Seeder;

class PolygonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Polygon::factory()
            ->count(4)
            ->create();
    }
}
