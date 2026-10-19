<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 30);
            $table->string('treatment_slug');
            $table->string('promotion_code')->nullable();
            $table->date('booking_date');
            $table->string('booking_time', 5);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['booking_date', 'booking_time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
