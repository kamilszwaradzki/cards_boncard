<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'card_number' => fake()->isbn10() . fake()->isbn10(),
            'PIN' => fake()->numberBetween(1000,9999),
            'active_date' => now(),
            'expiry_date' => now(),
            'saldo' => fake()->randomFloat(2,0,99999.99),
        ];
    }
}
