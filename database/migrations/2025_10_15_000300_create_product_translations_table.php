<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_translations', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 5)->index('idx_pt_locale');
            $table->string('slug');
            $table->string('name');
            $table->string('category');
            $table->text('description');
            $table->json('features')->nullable();
            $table->timestamps();

            $table->unique(['product_id', 'locale'], 'uniq_pt_product_locale');
            $table->unique(['locale', 'slug'], 'uniq_pt_locale_slug');
            $table->index(['product_id', 'locale'], 'idx_pt_product_locale');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_translations');
    }
};
