<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()
            ->words(fake()->numberBetween(1, 3), true);
        return [
            'user_id' => User::where('username', 'admin')->first()->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence,
        ];
    }
}
