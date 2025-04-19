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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('meta_title')->nullable(true);
            $table->string('meta_description')->nullable(true);
            $table->string('meta_keywords')->nullable(true);

            $table->string('writer_title')->nullable(true);
            $table->string('writer_content')->nullable(true);
            $table->string('writer_name')->nullable(true);

            $table->string('faq_title')->nullable(true);
            $table->string('faq_content')->nullable(true);
            $table->string('faq_name')->nullable(true);

            $table->string('customer_title')->nullable(true);
            $table->string('customer_content')->nullable(true);
            $table->string('customer_name')->nullable(true);

            $table->string('status')->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
