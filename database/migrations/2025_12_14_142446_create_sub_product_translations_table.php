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
        Schema::create('sub_product_translations', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('sub_product_id')->constrained('sub_products')->cascadeOnDelete();
            $table->string('locale', 5)->index();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->unique(['sub_product_id', 'locale'], 'spt_subproduct_locale_unique');
            $table->index(['locale', 'sub_product_id'], 'spt_locale_subproduct_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_product_translations');
    }
};
