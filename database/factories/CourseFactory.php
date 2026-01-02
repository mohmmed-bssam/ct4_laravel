<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            'title' => $this->faker->words(4, true),
            'image' => $this->faker->imageUrl(),
            'content' => $this->faker->paragraphs(5, true),
            'hours' => $this->faker->numberBetween(40, 60),
            'price' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}