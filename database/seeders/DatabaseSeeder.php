<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserRolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ForumSeeder::class);
        $this->call(ThreadSeeder::class);
        $this->call(LcuJobSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostCommentSeeder::class);
        $this->call(PostLikeSeeder::class);
        $this->call(PostBookmarkSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(DonationSeeder::class);
        $this->call(SponsorSeeder::class);
    }
}
