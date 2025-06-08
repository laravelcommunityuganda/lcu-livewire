<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum>
 */
class ForumFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()
            ->words(fake()->numberBetween(1, 3), true);
        return [
            'user_id' => User::where('email', 'admin@example.com')->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id
                ?? Category::factory()->create()->id,
            'title' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence,
        ];
    }
}
