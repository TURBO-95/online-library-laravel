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
        
        $genres = ['Fantasy', 'Science Fiction', 'Mystery', 'Thriller', 'Romance', 'Historical Fiction', 'Biography'];

        return [
            
            'author' => fake()->name(), 
            'isbn' => fake()->unique()->isbn13(), // Generates a unique 13-digit ISBN
            'genre' => fake()->randomElement($genres), 
            'quantity' => fake()->numberBetween(1, 20), 
            'description' => fake()->paragraph(5), 
        ];
    }
}