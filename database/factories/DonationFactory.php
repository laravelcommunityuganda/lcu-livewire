<?php

namespace Database\Factories;

use App\Enum\DonationStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $amount = fake()->numberBetween(200, 31000);
        return [
            'user_id' => $user ? $user->id : 'null',
            'name' => $user ? (string) $user->first_name . ' ' . $user->last_name : fake()->name(),
            'email' => fake()->email(),
            'amount' => $amount,
            'currency' => $amount > 30000 ? 'UGX' : 'USD',
            'payment_method' => fake()->randomElement(['Card', 'Cash', 'Check']),
            'transaction_id' => fake()->uuid(),
            'status' => fake()->randomElement(DonationStatusEnum::cases()),
            'message' => fake()->paragraph(),
            'is_anonymous' => fake()->randomElement([true, false])
        ];
    }
}
