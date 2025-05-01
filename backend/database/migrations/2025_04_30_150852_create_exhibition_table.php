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
        Schema::create('APIServer_exhibition', function (Blueprint $table) {
            $table->id();
            $table->string('exhibition_title');
            $table->string('exhibition_poster')->nullable();
            $table->string('exhibition_category')->nullable();
            $table->date('exhibition_start_date')->nullable();
            $table->date('exhibition_end_date')->nullable();
            $table->dateTime('exhibition_start_time')->nullable();
            $table->dateTime('exhibition_end_time')->nullable();
            $table->string('exhibition_location')->nullable();
            $table->string('exhibition_price')->nullable();
            $table->unsignedBigInteger('gallery_id');
            $table->string('exhibition_tag')->nullable();
            $table->enum('exhibition_status', ['scheduled', 'exhibited', 'ended'])->default('scheduled');
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
            
            // Foreign key constraint
            $table->foreign('gallery_id')->references('id')->on('APIServer_gallery')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('APIServer_exhibition');
    }
};
