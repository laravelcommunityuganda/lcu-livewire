<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ForumSeeder::class);
        $this->call(LcmJobSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(EventSeeder::class);
    }
}
