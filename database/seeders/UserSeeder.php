<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Seeder for creating a test user and 5 additional users using the factory.
 * Used for populating the users table during interview test trials.
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        //? Seed 5 users with the same name and email
        User::factory(5)->create();
    }
}