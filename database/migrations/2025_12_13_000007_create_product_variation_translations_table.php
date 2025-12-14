<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_variation_translations', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('product_variation_id')->constrained('product_variations')->cascadeOnDelete();
            $table->string('locale', 5)->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unique(['product_variation_id', 'locale'], 'pvt_variation_locale_unique');
            $table->index(['locale', 'product_variation_id'], 'pvt_locale_variation_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_variation_translations');
    }
};
