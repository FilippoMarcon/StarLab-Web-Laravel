<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->decimal('amount', 8, 2)->nullable()->after('staff_notes_updated_at');
            $table->timestamp('paid_at')->nullable()->after('amount');
            $table->string('stripe_session_id')->nullable()->after('paid_at');
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn(['amount', 'paid_at', 'stripe_session_id']);
        });
    }
};
