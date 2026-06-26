<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@starlabdesign.it',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
    }
}
