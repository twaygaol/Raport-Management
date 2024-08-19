
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNilaiToNilaisTable extends Migration
{
    public function up()
    {
        Schema::table('nilais', function (Blueprint $table) {
            // $table->decimal('nilai', 8, 2)->nullable()->after('id_mapel'); // Atau ganti sesuai dengan tipe data yang diinginkan
        });
    }

    public function down()
    {
        Schema::table('nilais', function (Blueprint $table) {
            // $table->dropColumn('nilai');
        });
    }
}
