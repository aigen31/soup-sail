<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyCategory>
 */
class CompanyCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
					'name' => $this->faker->unique()->randomElement(['Shop', 'IT', 'Advestering', 'Building', 'Factory'])
        ];
    }
}
