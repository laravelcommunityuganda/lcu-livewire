<?php

namespace Database\Factories;

use App\Enum\PostTypesEnum;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(fake()->numberBetween(1, 8), true);
        $date = fake()->dateTimeBetween('-2 years', now());
        return [
            'user_id' => User::where('email', 'admin@example.com')->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id
                ?? Category::factory()->create()->id,
            'title' => $name,
            'slug' => Str::slug($name),
            'excerpt' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'image' => fake()->image(null, 640, 640),
            'type' => fake()->randomElement(PostTypesEnum::cases()),
            'is_published' => fake()->randomElement([true, false]),
            'published_at' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
