<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('user:set-admin {email} {--create : Create the user if they do not exist} {--password= : Set a password when creating}', function () {
    $email = $this->argument('email');
    $user = User::where('email', $email)->first();

    if ($user) {
        $user->update(['role' => 'admin']);
        $this->info("User {$email} is now admin.");
        return;
    }

    if (!$this->option('create')) {
        $this->error("User {$email} not found. Use --create to create them.");
        return 1;
    }

    $password = $this->option('password') ?? env('ADMIN_PASSWORD') ?? Str::password(12);
    User::create([
        'name' => 'Admin',
        'email' => $email,
        'password' => Hash::make($password),
        'role' => 'admin',
    ]);

    $this->info("Admin user {$email} created with password: {$password}");
    $this->warn('Change the password after first login.');
})->purpose('Set a user as admin (or create one)');
