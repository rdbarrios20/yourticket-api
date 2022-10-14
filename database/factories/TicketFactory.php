<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => fake()->unique()->numberBetween(1, 1000),
            'reference' => fake()->unique()->numberBetween(1000, 9000),
            'status' => fake()->randomElement(['Disponible', 'No disponible']),
        ];
    }
}
