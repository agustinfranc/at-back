<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Companion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => Client::factory(),
            'companion_id' => Companion::factory(),
            'hours' => fake()->numberBetween('1', '24'),
            'from' => fake()->time(),
            'to' => fake()->time(),
            'date' => fake()->date(),
        ];
    }
}
