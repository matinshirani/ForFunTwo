<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'pages' => fake()->biasedNumberBetween(50, 500),
            'ISBN' => fake()->unique()->numerify('##########'),
            'price' => fake()->randomNumber(),
            'published_at' => fake()->date()
        ];
    }
}
