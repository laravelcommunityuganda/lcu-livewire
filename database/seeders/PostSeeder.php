<?php

namespace Database\Seeders;

use App\Enum\PostTypesEnum;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()
            ->count(50)
            ->create([
                'user_id' => User::where('email', 'admin@example.com')->first()->id,
                'is_published' => true,
                'type' => PostTypesEnum::Tutorial->value,
            ]);
        Post::factory()
            ->count(150)
            ->create();

    }
}
