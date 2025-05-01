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
            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('APIServer_gallery')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('APIServer_user');
    }
};
