<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'PHP', 'slug' => 'php'],
            ['name' => 'JavaScript', 'slug' => 'javascript'],
            ['name' => 'Vue.js', 'slug' => 'vuejs'],
            ['name' => 'React', 'slug' => 'react'],
            ['name' => 'Tailwind CSS', 'slug' => 'tailwindcss'],
            ['name' => 'Bootstrap', 'slug' => 'bootstrap'],
            ['name' => 'MySQL', 'slug' => 'mysql'],
            ['name' => 'PostgreSQL', 'slug' => 'postgresql'],
            ['name' => 'API Development', 'slug' => 'api-development'],
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Software Engineering', 'slug' => 'software-engineering'],
            ['name' => 'DevOps', 'slug' => 'devops'],
            ['name' => 'Cloud Computing', 'slug' => 'cloud-computing'],
            ['name' => 'Machine Learning', 'slug' => 'machine-learning'],
            ['name' => 'Artificial Intelligence', 'slug' => 'artificial-intelligence'],
            ['name' => 'Cybersecurity', 'slug' => 'cybersecurity'],
            ['name' => 'Blockchain', 'slug' => 'blockchain'],
            ['name' => 'Internet of Things', 'slug' => 'iot'],
            ['name' => 'Mobile Development', 'slug' => 'mobile-development'],
            ['name' => 'Game Development', 'slug' => 'game-development'],
            ['name' => 'Data Science', 'slug' => 'data-science'],
            ['name' => 'Big Data', 'slug' => 'big-data'],
        ];

        foreach ($tags as $tag) {
            Tag::factory()->create([
                'name' => $tag['name'],
                'slug' => $tag['slug'],
            ]);
        }

        $posts = Post::all();
        $posts->each(function ($post) {
            $post->tags()->attach(
                Tag::inRandomOrder()
                    ->take(rand(1, 3))
                    ->pluck('id')
                    ->toArray()
            );
        });

    }
}
