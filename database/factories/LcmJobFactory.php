<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LcmJob>
 */
class LcmJobFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()
            ->words(fake()->numberBetween(1, 3), true);
        return [
            'user_id' => User::where('email', 'admin@example.com')->first()->id,
            'title' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence,
            'company_name' => fake()->company(),
            'company_description' => $this->faker->sentence,
            'company_logo' => fake()->imageUrl(),
            'location' => fake()->country(),
            'employment_type' => fake()->randomElement(['full-time', 'part-time', 'contract', 'internship', 'freelance']),
            'salary_min' => fake()->numberBetween(100, 180),
            'salary_max' => fake()->numberBetween(180, 300),
            'apply_url' => fake()->url(),
            'is_remote' => fake()->randomElement([true, false]),
            'is_featured' => fake()->randomElement([true, false]),
            'expires_at' => fake()->dateTimeBetween(now(), '+1 month')
        ];
    }
}
