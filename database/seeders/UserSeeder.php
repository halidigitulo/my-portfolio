<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'is_active' => true,
            'profile_picture' => null,
            'bio' => null,
            'last_login_at' => null,
            'last_login_ip' => null,
        ]);
    }
}
