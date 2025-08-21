<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //? Call seeders
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
