<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => fake()->text(6),
            'address' => fake()->address(),
            'email' => fake()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'vat' => fake()->numberBetween(10,99),
            'website' => fake()->url()
        ];
    }
}
