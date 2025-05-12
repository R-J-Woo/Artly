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
        Schema::create('APIServer_user_book', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->string('user_book_payment_method');
            $table->enum('user_book_status', ['paid', 'canceled'])->default('paid');
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
            
            $table->foreign('user_id')->references('id')->on('APIServer_user')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('APIServer_book')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_user_book');
    }
};
