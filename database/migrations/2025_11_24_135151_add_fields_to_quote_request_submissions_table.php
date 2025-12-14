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
        Schema::table('quote_request_submissions', function (Blueprint $table) {
            $table->foreignId('product_id')->nullable()->after('company');
            $table->string('product_type', 255)->nullable()->after('product_id');
            $table->integer('quantity')->nullable()->after('product_type');
            $table->text('message')->nullable()->after('requirements');
            $table->boolean('is_read')->default(false)->after('status');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quote_request_submissions', function (Blueprint $table) {
            $table->dropIndex(['email']);
            $table->dropColumn(['product_id', 'product_type', 'quantity', 'message', 'is_read']);
        });
    }
};
