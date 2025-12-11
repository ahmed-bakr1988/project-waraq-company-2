<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('parent_product_id')->nullable()->constrained('products')->cascadeOnDelete();
            $table->string('image');
            $table->json('gallery')->nullable();
            $table->string('logo')->nullable();
            $table->string('url')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('sku')->nullable()->unique();
            $table->integer('stock')->default(0);
            $table->json('specs')->nullable();
            $table->json('downloads')->nullable();
            $table->integer('order')->default(0)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->timestamps();
            
            $table->index(['product_category_id', 'is_active']);
            $table->index(['parent_product_id', 'is_active']);
            $table->index(['is_active', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};