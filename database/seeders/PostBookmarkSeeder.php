<?php

namespace Database\Seeders;

use App\Models\PostBookmark;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostBookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostBookmark::factory()
            ->count(150) // Adjust the count as needed
            ->create([
                'user_id' => User::where('email', 'admin@example.com')->first()->id,
            ]);
    }
}
