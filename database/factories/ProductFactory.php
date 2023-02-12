<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name' => $this->faker->sentence(3),
            'price' => $this->faker->numberBetween(100,1000),
            'category_id' => $this->faker->numberBetween(9,10),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Product $product) {
            $product->addMediaFromUrl('https://dummyimage.com/300x180/eee/000.jpg')->toMediaCollection('cover');

        })->afterCreating(function (Product $product) {
            //
        });
    }
}
