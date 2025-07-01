<?php

namespace Database\Seeders;

use App\Models\Resource;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        Resource::factory()
            ->count(30)
            ->create([
                'user_id' => User::where('email', 'admin@example.com')->first()->id,
            ]);
    }
}
