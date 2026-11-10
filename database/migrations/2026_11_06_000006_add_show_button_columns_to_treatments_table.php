<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->boolean('show_detail_button')->default(true)->after('product_ids');
            $table->boolean('show_booking_button')->default(true)->after('show_detail_button');
        });
    }

    public function down(): void
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->dropColumn(['show_detail_button', 'show_booking_button']);
        });
    }
};
