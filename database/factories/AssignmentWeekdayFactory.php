<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Weekdays>
 */
class AssignmentWeekdayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'monday' => fake()->boolean(),
            'tuesday' => fake()->boolean(),
            'wednesday' => fake()->boolean(),
            'thursday' => fake()->boolean(),
            'friday' => fake()->boolean(),
            'saturday' => fake()->boolean(),
            'sunday' => fake()->boolean(),
        ];
    }
}
