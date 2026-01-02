<?php

namespace Database\Seeders;

use App\Models\Course;
use COM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::truncate();
        Course::factory()->count(10)->create();
    }
}
