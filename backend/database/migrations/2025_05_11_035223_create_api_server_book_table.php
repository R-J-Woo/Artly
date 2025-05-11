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
        Schema::create('APIServer_book', function (Blueprint $table) {
            $table->id();
            $table->string('book_title');
            $table->string('book_poster')->nullable();
            $table->foreignId('exhibition_id')->constrained('APIServer_exhibition')->onDelete('cascade');
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_book');
    }
};
