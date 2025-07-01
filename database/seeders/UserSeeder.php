<?php

namespace Database\Seeders;

use App\Enum\UserRolesEnum;
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

        $member = User::factory()->create([
            'email' => 'editor@example.com',
            'is_active' => true,
            'created_at' => now()
        ]);

        $member->assignRole(UserRolesEnum::Editor->value);

        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'created_at' => now()
        ]);

        $admin->assignRole(UserRolesEnum::Admin->value);

        $super_admin = User::factory()->create([
            'email' => 'super_admin@example.com',
            'is_active' => true,
            'created_at' => now()
        ]);

        $super_admin->assignRole(UserRolesEnum::Super_Admin->value);


        $users = User::factory()
            ->count(10)
            ->create();

        $users->each(function ($user) {
            $user->assignRole(UserRolesEnum::User);
        });

        $user = User::factory()->create([
            'email' => 'user@example.com',
            'is_active' => true,
            'created_at' => now()
        ]);
        $user->assignRole(UserRolesEnum::User->value);
    }
}
