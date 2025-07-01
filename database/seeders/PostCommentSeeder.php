<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $posts->each(function ($post) {
            // Ensure each post has at least one comment
            PostComment::factory()
                ->count(2)
                ->create([
                    'user_id' => User::where('email', 'admin@example.com')->first()->id, // Ensure admin user is the author of the first 2 comment
                    'post_id' => $post->id
                ]);
            PostComment::factory()
                ->count(4) // Ensure each post has a few comments
                ->create(['post_id' => $post->id]);
        });
        PostComment::factory()
            ->count(100) // Adjust the count as needed
            ->create();

    }
}
