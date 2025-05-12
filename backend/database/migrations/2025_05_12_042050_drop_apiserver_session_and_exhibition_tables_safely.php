<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * → 테이블 두 개 삭제 (의존성 안전하게 처리)
     */
    public function up(): void
    {
        // 1️⃣ session 테이블에서 외래 키 제약 조건 먼저 삭제
        Schema::table('APIServer_session', function (Blueprint $table) {
            $table->dropForeign(['exhibition_id']);
        });

        // 2️⃣ session 테이블 삭제
        Schema::dropIfExists('APIServer_session');

        // 3️⃣ exhibition 테이블의 gallery_id 외래 키도 안전하게 삭제
        Schema::table('APIServer_exhibition', function (Blueprint $table) {
            $table->dropForeign(['gallery_id']);
        });

        // 4️⃣ exhibition 테이블 삭제
        Schema::dropIfExists('APIServer_exhibition');
    }

    /**
     * Reverse the migrations.
     * → 테이블 두 개 다시 생성 (원래 상태로)
     */
    public function down(): void
    {
        // 1️⃣ exhibition 테이블 재생성
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

            $table->foreign('gallery_id')->references('id')->on('APIServer_gallery')->onDelete('cascade');
        });

        // 2️⃣ session 테이블 재생성
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
};
