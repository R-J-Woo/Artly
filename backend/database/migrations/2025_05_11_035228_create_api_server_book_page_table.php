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
        Schema::create('APIServer_book_page', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('APIServer_book')->onDelete('cascade');
            $table->foreignId('art_id')->constrained('APIServer_art')->onDelete('cascade');
            $table->integer('book_page_sequence');
            $table->text('book_page_description')->nullable();
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_book_page');
    }
};
