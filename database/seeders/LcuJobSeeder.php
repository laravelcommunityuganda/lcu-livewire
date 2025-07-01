<?php

namespace Database\Seeders;

use App\Models\LcuJob;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LcuJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LcuJob::factory()
            ->count(100)
            ->create([
                'user_id' => User::where('email', 'admin@example.com')->first()->id,
            ]);
    }
}
