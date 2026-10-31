<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->string('category')->nullable()->after('filter');
            $table->string('action')->nullable()->after('price');
            $table->boolean('is_primary')->default(false)->after('action');
            $table->string('alt')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->dropColumn(['category', 'action', 'is_primary', 'alt']);
        });
    }
};
