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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'dni' => fake()->numberBetween('1','99999999'),
            'phone' => fake()->numberBetween('1','99999999'),
            'rate' => fake()->numberBetween('1','9999'),
            'taxable' => fake()->numberBetween('1','100'),
            'comments' => fake()->words(20, true),
            'address' =>fake()->words(2, true),
            'guardian_name' => fake()->name(),
            'extra_phone' => fake()->numberBetween('1','99999999'),
            'birthday' => fake()->date(),
            'medicine' => fake()->words(2, true),
            'diagnosis' => fake()->words(2, true),
            'job_description' => fake()->words(5, true),
            'health_insurance' => fake()->words(1, true),
            'affiliate' => fake()->words(1, true),
            'budget_date' => fake()->date(),
        ];
    }
}
