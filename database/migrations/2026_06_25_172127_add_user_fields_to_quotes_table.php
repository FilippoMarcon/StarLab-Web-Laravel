<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete()->after('id');
            $table->uuid('token')->unique()->nullable()->after('status');
            $table->text('staff_notes')->nullable()->after('token');
            $table->timestamp('staff_notes_updated_at')->nullable()->after('staff_notes');
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'token', 'staff_notes', 'staff_notes_updated_at']);
        });
    }
};
