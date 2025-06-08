<?php

namespace Database\Seeders;

use App\Models\LcmJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LcmJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LcmJob::factory()
            ->count(10)
            ->create();
    }
}
