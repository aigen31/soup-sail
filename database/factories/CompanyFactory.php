<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => $this->faker->unique()->randomElement(['Apple', 'Microsoft Corporation', 'Xiaomi', 'Google', 'ASUS', 'Samsung', 'Valve']),
      'site_url' => $this->faker->unique()->randomElement(['https://example1.com', 'https://example2.com', 'https://example3.com', 'https://example4.com', 'https://example5.com', 'https://example6.com', 'https://example7.com']),
      // 'user_id' => $this->faker->unique()->numberBetween(1, 7)
    ];
  }
}
