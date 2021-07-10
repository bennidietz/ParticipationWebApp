<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@test.de',
            'password' => Hash::make('1234'),
            'profile_photo_path' => 'https://www.processmaker.com/wp-content/uploads/2020/10/citizen-developer-768x512.jpg',
        ]);
        User::factory()
            ->count(50)
            ->create();
    }
}
