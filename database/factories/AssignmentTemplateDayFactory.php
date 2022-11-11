<?php

namespace Database\Factories;

use App\Models\AssignmentTemplate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssignmentDay>
 */
class AssignmentTemplateDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'assignment_template_id' => AssignmentTemplate::factory(),
            'day_id' => fake()->numberBetween('1', '7'),
            'hours' => fake()->numberBetween('1', '24'),
            'from' => fake()->time(),
            'to' => fake()->time(),
        ];
    }
}
