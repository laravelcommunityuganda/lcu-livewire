<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostLike>
 */
class PostLikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isLiked = $this->faker->boolean(80); // 80% chance of being liked
        return [
            'user_id' => User::inRandomOrder()->first()->id
                ?? User::factory()->create()->id, // get a random user or create one if none exist
            'post_id' => Post::inRandomOrder()->first()->id
                ?? Post::factory()->create()->id, //get a random post or create one if none exist
            'is_liked' => $isLiked,
            'is_disliked' => !$isLiked, // if liked, not disliked and vice versa
        ];
    }
}
