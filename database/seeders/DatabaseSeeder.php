<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DaerahSeeder::class,
            CalonSeeder::class,
            UsersTableSeeder::class
            // Seeder lain jika ada
        ]);
        // User::factory(10)->create();
        // Candidate::factory()->count(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     CandidateSeeder::class,
        // ]);
    }
}
