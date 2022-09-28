<?php

namespace Database\Factories;

use App\Models\AssignmentWeekday;
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
            'assignment_weekday_id' => AssignmentWeekday::factory(),
            'periodic' => fake()->boolean(),
            'enabled' => fake()->boolean(),
            'hours' => fake()->numberBetween('1','24'),
        ];
    }
}
