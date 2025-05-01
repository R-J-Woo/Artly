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
        Schema::create('APIServer_gallery', function (Blueprint $table) {
            $table->id();
            $table->string('gallery_name');
            $table->string('gallery_image')->nullable();
            $table->string('gallery_address');
            $table->dateTime('gallery_start_time')->nullable();
            $table->dateTime('gallery_end_time')->nullable();
            $table->dateTime('gallery_closed_day')->nullable();
            $table->string('gallery_category')->nullable();
            $table->text('gallery_description')->nullable();
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('APIServer_gallery');
    }
};
