<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'short_description' => $this->faker->text(50),
            'amount' => $this->faker->numberBetween(5, 20),
            'author_id' => $this->faker->numberBetween(1, 33),
        ];
    }
}
