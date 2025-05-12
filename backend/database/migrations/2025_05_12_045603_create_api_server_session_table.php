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
        Schema::create('APIServer_session', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exhibition_id');
            $table->dateTime('session_datetime');
            $table->integer('session_total_capacity');
            $table->integer('session_reservation_capacity');
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();

            $table->foreign('exhibition_id')->references('id')->on('APIServer_exhibition')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_session');
    }
};
