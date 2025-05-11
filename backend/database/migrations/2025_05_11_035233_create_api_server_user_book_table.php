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
            $table->foreignId('user_id')->constrained('APIServer_user')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('APIServer_book')->onDelete('cascade');
            $table->string('user_book_payment_method');
            $table->enum('user_book_status', ['paid', 'canceled'])->default('paid');
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
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
