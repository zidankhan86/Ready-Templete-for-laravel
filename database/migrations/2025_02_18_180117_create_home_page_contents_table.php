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
        Schema::create('home_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('homepage_title')->nullable();
            $table->text('homepage_content')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_content')->nullable();
            $table->string('home_btn')->nullable();
            $table->string('about_btn')->nullable();
            $table->string('footer_title')->nullable();
            $table->string('footer_btn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_contents');
    }
};
