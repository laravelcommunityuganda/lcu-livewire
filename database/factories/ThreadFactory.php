<?php

namespace Database\Factories;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $table->boolean('is_locked')->default(false);
        // $table->boolean('is_pinned')->default(false);
        // $table->integer('views_count')->default(0);
        // $table->timestamp('last_reply_at')->nullable();

        return [
            'user_id' => User::inRandomOrder()->first()->id
                ?? User::factory()->create()->id,
            'forum_id' => Forum::inRandomOrder()->first()->id
                ?? Forum::factory()->create()->id,
            'title' => fake()->words(3, true),
            'body' => fake()->paragraph(),
        ];
    }
}
