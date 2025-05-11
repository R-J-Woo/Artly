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
        Schema::create('APIServer_announcement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('APIServer_user')->onDelete('cascade');
            $table->string('announcement_title');
            $table->string('announcement_poster')->nullable();
            $table->datetime('announcement_start_datetime');
            $table->datetime('announcement_end_datetime');
            $table->string('announcement_organizer')->nullable();
            $table->string('announcement_support_detail')->nullable();
            $table->string('announcement_site_url')->nullable();
            $table->string('announcement_attachment_url')->nullable();
            $table->text('content')->nullable();
            $table->dateTime('create_dttm')->nullable();
            $table->dateTime('update_dttm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_server_announcement');
    }
};
