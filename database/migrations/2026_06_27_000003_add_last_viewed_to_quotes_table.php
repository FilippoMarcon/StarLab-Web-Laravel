<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->timestamp('client_last_viewed_at')->nullable()->after('delivered_at');
            $table->timestamp('staff_last_viewed_at')->nullable()->after('client_last_viewed_at');
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn(['client_last_viewed_at', 'staff_last_viewed_at']);
        });
    }
};
