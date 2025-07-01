<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donation::factory()
            ->count(20)
            ->create([
                'user_id' => User::where('email', 'admin@example.com')->first()->id,
            ]);
    }
}
