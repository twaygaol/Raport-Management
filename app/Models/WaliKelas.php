<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    protected $fillable = [
        'nama',
        'guru_id',
        'kelas_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function siswa()
{
    return $this->belongsTo(Siswa::class, 'kelas_id', 'id'); // Adjust as per your database
}
}
