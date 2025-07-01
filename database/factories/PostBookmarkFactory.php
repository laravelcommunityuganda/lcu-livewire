<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostBookmark>
 */
class PostBookmarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $is_bookmarked = $this->faker->boolean(50); // 50% chance of being bookmarked
        return [
            'user_id' => User::inRandomOrder()->first()->id
                ?? User::factory()->create()->id, // get a random user or create one if none exist
            'post_id' => Post::inRandomOrder()->first()->id
                ?? Post::factory()->create()->id, //get a random post or create one if none exist
            'is_bookmarked' => $is_bookmarked,
            'bookmarked_at' => $is_bookmarked ? now() : null,
            'unbookmarked_at' => $is_bookmarked ? null : now(),
        ];
    }
}
