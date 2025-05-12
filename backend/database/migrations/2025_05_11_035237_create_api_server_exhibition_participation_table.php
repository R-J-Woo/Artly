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
        Schema::create('APIServer_exhibition_participation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exhibition_id');
            $table->unsignedBigInteger('artist_id');
            $table->string('role');
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
            
            $table->foreign('exhibition_id')->references('id')->on('APIServer_exhibition')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('APIServer_artist')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_exhibition_participation');
    }
};
