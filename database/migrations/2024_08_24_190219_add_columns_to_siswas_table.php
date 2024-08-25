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
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->string('nik')->nullable();
            $table->string('tmp_lhr')->nullable();
            $table->date('tgl_lhr')->nullable();
            $table->string('jk')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('sts_anak')->nullable();
            $table->string('jml_saudara')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn([
                'email',
                'foto',
                'nik',
                'tmp_lhr',
                'tgl_lhr',
                'jk',
                'hobi',
                'cita_cita',
                'sts_anak',
                'jml_saudara',
                'anak_ke',
                'nama_ibu',
                'pekerjaan_ibu',
                'nama_ayah',
                'pekerjaan_ayah',
                'nama_wali',
                'pekerjaan_wali',
            ]);
        });
    }
};
