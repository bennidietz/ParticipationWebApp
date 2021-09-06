<?php

namespace Database\Seeders;

use App\Models\Marker;
use Illuminate\Database\Seeder;

class MarkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marker::factory()
            ->count(7)
            ->create();
    }
}
