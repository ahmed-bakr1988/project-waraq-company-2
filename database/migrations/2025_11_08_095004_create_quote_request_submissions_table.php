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
        Schema::create('quote_request_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 255);
            $table->string('phone', 20);
            $table->string('company', 100);
            $table->string('project_type', 100);
            $table->string('budget_range', 50)->nullable();
            $table->string('timeline', 100)->nullable();
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->enum('status', ['new', 'contacted', 'quoted', 'accepted', 'rejected'])->default('new');
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
            
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_request_submissions');
    }
};
