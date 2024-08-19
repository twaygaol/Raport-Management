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
        Schema::table('nilais', function (Blueprint $table) {
            // Periksa dan tambahkan kolom jika belum ada
            if (!Schema::hasColumn('nilais', 'id_tahun_akademik')) {
                $table->unsignedBigInteger('id_tahun_akademik')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'id_kelas')) {
                $table->unsignedBigInteger('id_kelas')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'id_mapel')) {
                $table->unsignedBigInteger('id_mapel')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'id_siswa')) {
                $table->unsignedBigInteger('id_siswa')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_tugas1')) {
                $table->integer('nilai_tugas1')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_tugas2')) {
                $table->integer('nilai_tugas2')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_tugas3')) {
                $table->integer('nilai_tugas3')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_tugas4')) {
                $table->integer('nilai_tugas4')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_tugas5')) {
                $table->integer('nilai_tugas5')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_uh1')) {
                $table->integer('nilai_uh1')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_uh2')) {
                $table->integer('nilai_uh2')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_uh3')) {
                $table->integer('nilai_uh3')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_uh4')) {
                $table->integer('nilai_uh4')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_uh5')) {
                $table->integer('nilai_uh5')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_uts')) {
                $table->integer('nilai_uts')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'nilai_uas')) {
                $table->integer('nilai_uas')->nullable();
            }
            if (!Schema::hasColumn('nilais', 'kikd_mapel')) {
                $table->unsignedBigInteger('id_mapel')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilais', function (Blueprint $table) {
            $table->dropColumn([
                'id_tahun_akademik',
                'id_kelas',
                'id_mapel',
                'id_siswa',
                'nilai_tugas1',
                'nilai_tugas2',
                'nilai_tugas3',
                'nilai_tugas4',
                'nilai_tugas5',
                'nilai_uh1',
                'nilai_uh2',
                'nilai_uh3',
                'nilai_uh4',
                'nilai_uh5',
                'nilai_uts',
                'nilai_uas',
                'kikd_mapel',
            ]);
        });
    }
};
