<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genre = Genre::inRandomOrder()->first();

        return [
            'title' => $this->faker->sentence,
            'genre_id' => $genre->id, // Use the genre's ID as the foreign key
            'authors' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'released_at' => $this->faker->date,
            'cover_image' => $this->faker->imageUrl(),
            'pages' => $this->faker->numberBetween(100, 500),
            'language_code' => $this->faker->languageCode,
            'isbn' => $this->faker->unique()->isbn13,
            'in_stock' => $this->faker->numberBetween(0, 100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}