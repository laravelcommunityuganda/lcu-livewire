<?php

namespace Database\Factories;

use App\Enum\SponsorTierEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sponsor>
 */
class SponsorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'logo' => $this->faker->imageUrl(640, 480, 'business', true, 'Faker'),
            'website' => $this->faker->url(),
            'tier' => $this->faker->randomElement(SponsorTierEnum::getValues()),
            'description' => $this->faker->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
