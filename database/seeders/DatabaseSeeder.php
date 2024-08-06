<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Husain Mohamed',
            'email' => 'husain@example.com',
            'password' => bcrypt('9237179'),
        ]);

        $this->call(CollegeSeeder::class);
        $this->call(ProgramSeeder::class);

    }
}
