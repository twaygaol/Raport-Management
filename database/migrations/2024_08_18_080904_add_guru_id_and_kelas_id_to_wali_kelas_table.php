<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuruIdAndKelasIdToWaliKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wali_kelas', function (Blueprint $table) {
            $table->foreignId('guru_id')->constrained()->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wali_kelas', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
            $table->dropColumn('guru_id');
            $table->dropForeign(['kelas_id']);
            $table->dropColumn('kelas_id');
        });
    }
}
