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
        Schema::create('APIServer_user', function (Blueprint $table) {
            $table->id();
            $table->string('login_id');
            $table->string('login_pwd'); // 실제 비밀번호 저장 시 해시 필요
            $table->string('user_name');
            $table->string('user_gender')->nullable();
            $table->integer('user_age')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_img')->nullable();
            $table->string('user_keyword')->nullable();
            $table->boolean('admin_flag')->default(0);
            $table->unsignedBigInteger('gallery_id')->nullable();
            $table->dateTime('last_login_time')->nullable();
            $table->dateTime('reg_time')->nullable();
            $table->dateTime('update_dttm')->nullable();

            $table->foreign('gallery_id')->references('id')->on('APIServer_gallery')->onDelete('set null');
        });
        
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
            $table->integer('exhibition_price')->nullable();
            $table->unsignedBigInteger('gallery_id');
            $table->string('exhibition_tag')->nullable();
            $table->enum('exhibition_status', ['scheduled', 'exhibited', 'ended']);
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
        Schema::dropIfExists('APIServer_user');
        Schema::dropIfExists('exhibitions');
    }
};
