<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can add your seeding logic here
        // For example, you might want to create a default profile
        \App\Models\Profile::create([
            'nama' => 'Default Profile',
            'tagline' => 'Welcome to our application',
            'logo' => 'default-logo.png',
            'cover' => 'default-cover.jpg',
            // Add other fields as necessary
        ]);
    }
}
