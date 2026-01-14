<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    // Course::factory(15)->create();
    //      User::factory(5)->create();
        // $this->call([
        //     CourseSeeder::class,
        // ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Tag::factory(10)->create();
    }
}