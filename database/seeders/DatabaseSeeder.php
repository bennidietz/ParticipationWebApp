<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(PolygonSeeder::class);
        $this->call(AssetSeeder::class);
        $this->call(SuggestionSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(VoteSeeder::class);
    }
}
