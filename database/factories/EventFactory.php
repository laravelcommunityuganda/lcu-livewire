<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()
            ->words(fake()->numberBetween(1, 3), true);
        $is_online = fake()->randomElement([true, false]);
        $image = fake()->imageUrl();
        return [
            'user_id' => User::where('email', 'admin@example.com')->first()->id,
            'title' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentence,
            'start_date' => fake()->dateTimeBetween(now(), '+2 months'),
            'end_date' => fake()->dateTimeBetween('+2 months', '+3 months'),
            'location' => fake()->address(),
            'image' => $is_online ? $image : fake()->randomElement([null, $image]),
            'type' => fake()->randomElement(['meetup', 'workshop', 'conference', 'hackathon']),
            'is_online' => $is_online,
            'meeting_url' => $is_online ? fake()->url() : null,
            'max_attendees' => $is_online ? null : fake()->numberBetween(20, 1000),
            'is_published' => fake()->randomElement([true, false])
        ];
    }
}
