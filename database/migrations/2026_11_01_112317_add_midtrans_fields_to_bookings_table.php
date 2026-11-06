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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('midtrans_order_id')->nullable()->after('payment_proof');
            $table->string('midtrans_transaction_id')->nullable()->after('midtrans_order_id');
            $table->string('midtrans_payment_type')->nullable()->after('midtrans_transaction_id');
            $table->string('midtrans_transaction_status')->nullable()->after('midtrans_payment_type');
            $table->string('midtrans_va_number')->nullable()->after('midtrans_transaction_status');
            $table->string('midtrans_qr_string')->nullable()->after('midtrans_va_number');
            $table->text('midtrans_response')->nullable()->after('midtrans_qr_string');
            $table->timestamp('midtrans_paid_at')->nullable()->after('midtrans_response');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'midtrans_order_id',
                'midtrans_transaction_id',
                'midtrans_payment_type',
                'midtrans_transaction_status',
                'midtrans_va_number',
                'midtrans_qr_string',
                'midtrans_response',
                'midtrans_paid_at',
            ]);
        });
    }
};
