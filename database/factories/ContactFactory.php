<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'uid' => fake()->numberBetween(11,11),
            'company' => fake()->company(),
            'phone' => fake()->tollFreePhoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'remember_token' => Str::random(100),
        ];
    }
}
