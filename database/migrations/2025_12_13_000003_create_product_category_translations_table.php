<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_category_translations', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('product_category_id')->constrained('product_categories')->cascadeOnDelete();
            $table->string('locale', 5)->index();
            $table->string('slug');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();

            $table->unique(['product_category_id', 'locale']);
            $table->unique(['locale', 'slug']);
            $table->index(['locale', 'product_category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_category_translations');
    }
};
