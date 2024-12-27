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
        Schema::table('conditions', function (Blueprint $table) {
            $table->dropForeign('conditions_sign_id_foreign');
            $table->dropColumn('sign_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('conditions', function (Blueprint $table) {
            $table->foreignId('sign_id')->constrained('signs')->onDelete('cascade');
        });
    }
};
