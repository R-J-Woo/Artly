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
        Schema::create('APIServer_art', function (Blueprint $table) {
            $table->id();
            $table->string('art_image')->nullable();
            $table->foreignId('artist_id')->constrained('APIServer_artist')->onDelete('cascade');
            $table->string('art_title');
            $table->text('art_description')->nullable();
            $table->string('art_docent')->nullable();
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_art');
    }
};
