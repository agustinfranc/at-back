<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\Day;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssignmentDay>
 */
class AssignmentDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'assignment_id' => Assignment::factory(),
            'day_id' => Day::factory(),
            'hours' => fake()->numberBetween('1', '24'),
            'from' => fake()->time(),
            'to' => fake()->time(),
        ];
    }
}
