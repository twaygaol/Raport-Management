<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'nisn',
        'kelas_id',
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
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'siswa_id');
    }

    public function walikelas()
    {
        return $this->hasMany(WaliKelas::class, 'kelas_id', 'id'); // Adjust as per your database
    }

    public function sikabs()
    {
        return $this->hasMany(Sikab::class, 'siswa_id');
    }
}
