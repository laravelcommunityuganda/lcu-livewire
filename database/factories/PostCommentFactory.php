<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostComment>
 */
class PostCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id
                ?? User::factory()->create()->id, // get a random user or create one if none exist
            'post_id' => Post::inRandomOrder()->first()->id
                ?? Post::factory()->create()->id, //get a random post or create one if none exist
            'parent_id' => PostComment::inRandomOrder()->first()->id
                ?? null, // get a random comment or create one if none exist
            'content' => $this->faker->paragraph(),
        ];
    }
}
