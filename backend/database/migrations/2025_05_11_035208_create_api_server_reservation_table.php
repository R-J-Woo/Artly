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
            $table->foreignId('user_id')->constrained('APIServer_user')->onDelete('cascade');
            $table->foreignId('session_id')->constrained('APIServer_session')->onDelete('cascade');
            $table->datetime('reservation_datetime');
            $table->integer('reservation_number_of_tickets');
            $table->integer('reservation_total_price');
            $table->string('reservation_payment_method');
            $table->enum('reservation_status', ['reserved', 'canceled'])->default('reserved');
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
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
