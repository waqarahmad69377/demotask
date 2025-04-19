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
        Schema::create('writers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('writer_no')->unique();
            $table->string('about')->nullable(true);
            $table->string('education')->nullable(true);
            $table->string('profession')->nullable(true);
            $table->string('status');
            $table->string('experience')->nullable(true);
            $table->string('rating')->nullable(true);
            $table->string('no_of_review')->nullable(true);
            $table->string('order')->nullable(true);
            $table->string('scucess_rate')->nullable(true);
            $table->string('on_time_rate')->nullable(true);
            $table->string('competences')->nullable(true);
            $table->string('works')->nullable(true);
            $table->string('online_status')->nullable(true);
            $table->string('delivery_time')->nullable(true);
            $table->string('subjects')->nullable(true);
            $table->string('reviews')->nullable(true);
            $table->string('image')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('writers');
    }
};
