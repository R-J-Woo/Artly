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
        Schema::create('APIServer_artist', function (Blueprint $table) {
            $table->id();
            $table->string('artist_image')->nullable();
            $table->string('artist_name');
            $table->string('artist_category');
            $table->string('artist_nation');
            $table->text('artist_description')->nullable();
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_artist');
    }
};
