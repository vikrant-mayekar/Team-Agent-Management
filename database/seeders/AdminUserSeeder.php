<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first();
        if ($admin) {
            $admin->update(['role' => 'admin']);
            $this->command->info('First user set as admin.');
        } else {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]);
            $this->command->info('Admin user created: admin@example.com / password');
        }

        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'role' => 'user',
                'password' => Hash::make('password'),
            ]
        );
        $this->command->info('Regular user (no admin): user@example.com / password');
    }
}
