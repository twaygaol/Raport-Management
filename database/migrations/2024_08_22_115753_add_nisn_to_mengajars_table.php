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
        Schema::table('mengajars', function (Blueprint $table) {
            $table->string('nisn')->nullable()->after('id_guru');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mengajars', function (Blueprint $table) {
            $table->dropColumn('nisn'); 
        });
    }
};
