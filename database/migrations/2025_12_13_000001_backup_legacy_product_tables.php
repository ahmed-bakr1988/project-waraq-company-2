<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $legacyTables = [
            'legacy_product_categories',
            'legacy_product_category_translations',
            'legacy_products',
            'legacy_product_translations',
            'legacy_product_reviews',
        ];

        foreach ($legacyTables as $legacyTable) {
            if (Schema::hasTable($legacyTable)) {
                throw new RuntimeException("Legacy backup table already exists: {$legacyTable}. Aborting to avoid data loss.");
            }
        }

        // Drop foreign keys that reference products/product_categories so we can rename tables safely.
        if (Schema::hasTable('quote_request_submissions') && Schema::hasColumn('quote_request_submissions', 'product_id')) {
            try {
                Schema::table('quote_request_submissions', function (Blueprint $table): void {
                    $table->dropForeign(['product_id']);
                });
            } catch (\Throwable) {
                // Foreign key may not exist on fresh installs.
            }
        }

        if (Schema::hasTable('product_reviews') && Schema::hasColumn('product_reviews', 'product_id')) {
            try {
                Schema::table('product_reviews', function (Blueprint $table): void {
                    $table->dropForeign(['product_id']);
                });
            } catch (\Throwable) {
                // Foreign key may not exist.
            }
        }

        if (Schema::hasTable('product_translations') && Schema::hasColumn('product_translations', 'product_id')) {
            try {
                Schema::table('product_translations', function (Blueprint $table): void {
                    $table->dropForeign(['product_id']);
                });
            } catch (\Throwable) {
                // Foreign key may not exist.
            }
        }

        if (Schema::hasTable('products')) {
            try {
                Schema::table('products', function (Blueprint $table): void {
                    if (Schema::hasColumn('products', 'product_category_id')) {
                        $table->dropForeign(['product_category_id']);
                    }

                    if (Schema::hasColumn('products', 'parent_product_id')) {
                        $table->dropForeign(['parent_product_id']);
                    }
                });
            } catch (\Throwable) {
                // Foreign keys may not exist.
            }
        }

        if (Schema::hasTable('product_category_translations') && Schema::hasColumn('product_category_translations', 'product_category_id')) {
            try {
                Schema::table('product_category_translations', function (Blueprint $table): void {
                    $table->dropForeign(['product_category_id']);
                });
            } catch (\Throwable) {
                // Foreign key may not exist.
            }
        }

        // Rename existing product tables into legacy_* backup tables.
        if (Schema::hasTable('product_categories')) {
            Schema::rename('product_categories', 'legacy_product_categories');
        }

        if (Schema::hasTable('product_category_translations')) {
            Schema::rename('product_category_translations', 'legacy_product_category_translations');
        }

        if (Schema::hasTable('products')) {
            Schema::rename('products', 'legacy_products');
        }

        if (Schema::hasTable('product_translations')) {
            Schema::rename('product_translations', 'legacy_product_translations');
        }

        // Reviews are dropped per spec, but preserved here as legacy reference.
        if (Schema::hasTable('product_reviews')) {
            Schema::rename('product_reviews', 'legacy_product_reviews');
        }
    }

    public function down(): void
    {
        throw new RuntimeException('This migration is intentionally not reversible. Restore from backup if needed.');
    }
};
