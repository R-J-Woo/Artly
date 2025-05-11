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
        Schema::create('APIServer_exhibition_art', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exhibition_id')->constrained('APIServer_exhibition')->onDelete('cascade');
            $table->foreignId('art_id')->constrained('APIServer_art')->onDelete('cascade');
            $table->integer('display_order');
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_exhibition_art');
    }
};
