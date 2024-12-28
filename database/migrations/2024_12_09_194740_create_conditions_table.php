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
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('date')->comment('記録対象日')->nullable(false);
            $table->foreignId('sign_id')->constrained('signs')->onDelete('cascade');
            $table->foreignId('weather_id')->constrained('weathers')->onDelete('cascade');
            $table->dateTime('sleep_time')->comment('就寝時刻');
            $table->dateTime('wakeup_time')->comment('起床時刻');
            $table->string('exercise')->comment('運動');
            $table->string('breakfast')->comment('朝食');
            $table->string('lunch')->comment('昼食');
            $table->string('dinner')->comment('夕食');
            $table->text('comment')->comment('詳細のコメント')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conditions');
    }
};
