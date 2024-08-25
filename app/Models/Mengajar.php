<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_tahunakademik',
        'semester',
        'id_guru',
        'nisn',
        'id_kelas',
        'id_mapel',
        'item',
        'kkm',
    ];

    // Optionally, you can define relationships if needed
    public function tahun_Akademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'id_tahunakademik');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
}
