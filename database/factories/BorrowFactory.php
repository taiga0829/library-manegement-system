<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reader_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'book_id' => function () {
                return \App\Models\Book::factory()->create()->id;
            },
            'status' => $this->faker->randomElement(['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNED']),
            'request_processed_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'request_managed_by' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'deadline' => $this->faker->dateTimeBetween('now', '+1 month'),
            'returned_at' => $this->faker->dateTimeBetween('now', '+1 month'),
            'return_managed_by' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}