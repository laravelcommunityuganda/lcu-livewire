<?php

namespace Database\Seeders;

use App\Models\Forum;
use App\Models\Thread;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forums = Forum::all();

        $forums->each(callback: function (Forum $forum): void {
            Thread::factory()
                ->count(8)
                ->create();
        });
    }
}
