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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nisn')->unique();
            $table->string('foto')->nullable();
            $table->string('nik')->unique();
            $table->string('tmp_lhr'); // Tempat Lahir
            $table->date('tgl_lhr'); // Tanggal Lahir
            $table->enum('jk', ['L', 'P']); // Jenis Kelamin
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->enum('sts_anak', ['Kandung', 'Angkat', 'Tiri'])->nullable(); // Status Anak
            $table->integer('jml_saudara')->nullable(); // Jumlah Saudara
            $table->integer('anak_ke')->nullable(); // Anak Ke
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('email_orangtua')->nullable();
            $table->string('nohp_orangtua')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
