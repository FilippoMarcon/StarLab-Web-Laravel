<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        User::where('email', 'starlabdesignstore@gmail.com')
            ->where('role', 'user')
            ->update(['role' => 'admin']);
    }

    public function down(): void
    {
        User::where('email', 'starlabdesignstore@gmail.com')
            ->update(['role' => 'user']);
    }
};
