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
        Schema::table('APIServer_user', function (Blueprint $table) {
            //
            $table->dropTimestamps(); // created_at, updated_at 모두 삭제
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('APIServer_user', function (Blueprint $table) {
            //
            $table->timestamps(); // 필요 시 다시 추가
        });
    }
};
