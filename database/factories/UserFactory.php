<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'billing_name' => $this->faker->name(),
            'address_country' => rand(10,999),
            'address_zip' => rand(10000,99999),
            'address_city' => $this->faker->city(),
            'address_street' => $this->faker->address(),
            'vat_number' => rand(10000000,99999999)."-".rand(0,9)."-".rand(10,99)
        ];
    }
}
