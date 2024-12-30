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
        Schema::table('signs', function (Blueprint $table) {
            $table->softDeletes()->comment('論理削除');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('signs', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
};
