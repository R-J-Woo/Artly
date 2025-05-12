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
        Schema::create('APIServer_reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('session_id');
            $table->dateTime('reservation_datetime');
            $table->integer('reservation_number_of_tickets');
            $table->integer('reservation_total_price');
            $table->string('reservation_payment_method');
            $table->enum('reservation_status', ['reserved', 'canceled', 'used']);
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
            
            $table->foreign('user_id')->references('id')->on('APIServer_user')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('APIServer_session')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_reservation');
    }
};
