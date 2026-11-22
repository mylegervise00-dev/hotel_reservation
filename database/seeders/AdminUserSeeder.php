<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (empty($email) || empty($password)) {
            throw new RuntimeException(
                'ADMIN_EMAIL and ADMIN_PASSWORD must be configured in your .env file.'
            );
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Hotel Administrator',
                'password' => Hash::make($password),
                'role' => 'admin',
            ]
        );
    }
}
