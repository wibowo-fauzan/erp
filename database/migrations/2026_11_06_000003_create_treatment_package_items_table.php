<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('treatment_package_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('treatment_packages')->onDelete('cascade');
            $table->foreignId('treatment_id')->constrained('treatments')->onDelete('cascade');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['package_id', 'treatment_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treatment_package_items');
    }
};
