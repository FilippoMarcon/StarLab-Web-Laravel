<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('paypal_txn_id')->nullable()->after('paid_at')->unique();
            $table->dropColumn('stripe_session_id');
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('paypal_txn_id');
            $table->string('stripe_session_id')->nullable()->after('paid_at');
        });
    }
};
