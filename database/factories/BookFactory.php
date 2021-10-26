<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->domainName(),
            'description' => $this->faker->text(100),
            'price' => $this->faker->numberBetween(100,1000),
            'author' => $this->faker->name(),
            'no_of_pages' => $this->faker->numberBetween(0,300),
            'wholesale_price' => $this->faker->numberBetween(100,700),
            'image' => $this->faker->imageUrl(200,200),
            'compare_at_price' => $this->faker->numberBetween(10,400),
        ];
    }
}
