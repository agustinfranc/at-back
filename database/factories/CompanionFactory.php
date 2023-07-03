<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Companion>
 */
class CompanionFactory extends Factory
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
            'cuit' => fake()->numberBetween('1', '99999999'),
            'nationality' => fake()->words(1, true),
            'birthday' => fake()->date(),
            'has_sign_contract' => fake()->boolean(),
            'phone' => fake()->numberBetween('1', '99999999'),
            'max_taxable' => fake()->numberBetween('1', '100'),
            'monotax' => fake()->boolean(),
            'criminal_record' => fake()->boolean(),
            'insurance' => fake()->boolean(),
            'has_sign_contract' => fake()->boolean(),
        ];
    }
}
