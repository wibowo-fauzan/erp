<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Reset all values to defaults before changing column types
        DB::statement("UPDATE `treatments` SET `price` = 0");
        DB::statement("UPDATE `treatments` SET `duration_minutes` = NULL");

        Schema::table('treatments', function (Blueprint $table) {
            $table->decimal('price', 12, 2)->default(0)->change();
            $table->integer('duration_minutes')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->string('price')->nullable()->change();
            $table->string('duration_minutes')->nullable()->change();
        });
    }
};
