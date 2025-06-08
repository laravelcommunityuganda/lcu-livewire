<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' =>'user',
            'email' => 'user@example.com',
        ]);

        $admin = User::factory()->create([
            'name' =>'admin',
            'email' => 'admin@example.com',
        ]);

        $member = User::factory()->create([
            'name' =>'member',
            'email' => 'member@example.com',
        ]);
    }
}
