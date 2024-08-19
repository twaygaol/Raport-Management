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
        if (!Schema::hasTable('mengajars')) {
            Schema::create('mengajars', function (Blueprint $table) {
                $table->id();
                $table->foreignId('id_tahunakademik')->constrained('tahun_akademiks')->onDelete('cascade');
                $table->string('semester');
                $table->foreignId('id_guru')->constrained('gurus')->onDelete('cascade');
                $table->foreignId('id_kelas')->constrained('kelas')->onDelete('cascade');
                $table->foreignId('id_mapel')->constrained('mapels')->onDelete('cascade');
                $table->string('item');
                $table->decimal('kkm', 5, 2); // Assuming KKM is a decimal value
                $table->timestamps();
            });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mengajars');
    }
};
