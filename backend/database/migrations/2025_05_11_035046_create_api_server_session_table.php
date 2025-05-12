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
            $table->foreignId('exhibition_id')->constrained('APIServer_exhibition')->onDelete('cascade');
            $table->datetime('session_datetime');
            $table->integer('session_total_capacity');
            $table->integer('session_reservation_capacity');
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('APIServer_session', function (Blueprint $table) {  // 대소문자 맞춤!
            $table->dropForeign(['exhibition_id']);
        });

        Schema::dropIfExists('APIServer_session');
    }
};
