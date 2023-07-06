<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'is_visible' => true,
        ];
    }
}
