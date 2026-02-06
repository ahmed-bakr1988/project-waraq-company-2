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
        Schema::create('sub_products', function (Blueprint $table): void {
            $table->id();

            $table->foreignId('product_category_id')
                ->constrained('product_categories')
                ->cascadeOnDelete();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->string('size');
            $table->integer('order')->default(0)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->string('image')->nullable();

            $table->timestamps();

            $table->index(['product_category_id', 'is_active']);
            $table->index(['product_id', 'is_active']);
            $table->index(['product_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_products');
    }
};
