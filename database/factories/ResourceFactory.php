<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
 */
class ResourceFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()
            ->words(fake()->numberBetween(1, 3), true);
        return [
            'user_id' => User::where('username', 'admin')->first()->id,
            'title' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence,
            'file_path' => fake()->url(),
            'type' => fake()->randomElement(['document', 'video', 'code', 'presentation']),
            'access_level' => fake()->randomElement(['free', 'premium']),
            'download_count' => fake()->numberBetween(0, 100)
        ];
    }
}
