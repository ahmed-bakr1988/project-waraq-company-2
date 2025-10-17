<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('product_category_id')->nullable()->constrained('product_categories')->nullOnDelete();
            $table->string('image');
            $table->string('logo')->nullable();
            $table->string('url')->nullable();
            $table->text('summary')->nullable();
            $table->json('specs')->nullable();
            $table->json('downloads')->nullable();
            $table->integer('order')->default(0)->index('idx_products_order');
            $table->boolean('is_active')->default(true)->index('idx_products_is_active');
            $table->timestamps();

            $table->index(['is_active', 'order'], 'idx_products_active_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
