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
        Schema::table('weathers', function (Blueprint $table) {
            $table->foreignId('condition_id')->constrained('conditions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weathers', function (Blueprint $table) {
            $table->dropForeign('weathers_condition_id_foreign');
            $table->dropColumn('condition_id');
        });
    }
};
