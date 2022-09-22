<?php

namespace Database\Factories;

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
            'client_id' => fake()->numberBetween('1','9999999'),
            'companion_id' => fake()->numberBetween('1','99999'),
            'periodic' => fake()->boolean(),
            'enabled' => fake()->boolean(),
            'hours' => fake()->numberBetween('1','24'),
        ];
    }
}
