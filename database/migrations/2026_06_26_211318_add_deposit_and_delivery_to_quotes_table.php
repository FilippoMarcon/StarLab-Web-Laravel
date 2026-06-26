<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->timestamp('deposit_paid_at')->nullable()->after('paid_at');
            $table->string('deposit_paypal_txn_id', 255)->nullable()->after('paypal_txn_id');
            $table->timestamp('delivered_at')->nullable()->after('deposit_paypal_txn_id');
            $table->index('deposit_paid_at');
            $table->index('delivered_at');
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn(['deposit_paid_at', 'deposit_paypal_txn_id', 'delivered_at']);
        });
    }
};
