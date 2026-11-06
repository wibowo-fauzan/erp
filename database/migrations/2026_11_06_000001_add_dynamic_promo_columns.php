<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->string('slug')->unique()->after('id');
            $table->string('eyebrow')->nullable()->after('name');
            $table->string('image')->nullable()->after('description');
            $table->string('alt')->nullable()->after('image');
            $table->string('style')->nullable()->after('alt');
            $table->string('discount')->nullable()->after('discount_amount');
            $table->string('validity')->nullable()->after('discount');
            $table->string('minimum')->nullable()->after('validity');
            $table->string('date')->nullable()->after('minimum');
            $table->string('detail_title')->nullable()->after('date');
            $table->text('detail_description')->nullable()->after('detail_title');
            $table->json('benefits')->nullable()->after('detail_description');
            $table->json('terms')->nullable()->after('benefits');
        });
    }

    public function down(): void
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->dropColumn([
                'slug', 'eyebrow', 'image', 'alt', 'style', 'discount',
                'validity', 'minimum', 'date', 'detail_title', 'detail_description',
                'benefits', 'terms',
            ]);
        });
    }
};
