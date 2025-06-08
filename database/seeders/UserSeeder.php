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
            'username' =>'user',
            'email' => 'user@example.com',
        ]);

        $admin = User::factory()->create([
            'username' =>'admin',
            'email' => 'admin@example.com',
        ]);
        
        $member = User::factory()->create([
            'username' =>'member',
            'email' => 'member@example.com',
        ]);
    }
}
