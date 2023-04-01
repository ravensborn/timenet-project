<?php

namespace Database\Factories;

use App\Models\EnabledCountry;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Lwwcas\LaravelCountries\Models\Country;

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
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100, 1000),
            'category_id' => 1,
            'brand_id' => 1,
            'lc_country_id' => EnabledCountry::COUNTRY_IRAQ,
            'properties' => [],
        ];
    }

}
