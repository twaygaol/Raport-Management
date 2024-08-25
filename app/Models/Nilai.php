<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;


class Nilai extends Model
{
        use HasFactory;

        protected $fillable = [
            'id_tahunakademik',
            'id_kelas',
            'id_mapel',
            'kikd',
            'siswa_id',
            'nisn',
            'guru_id',
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
            'is_approved',
        ];
    

        protected static function booted()
        {
            // static::addGlobalScope('siswa', function (Builder $builder) {
            //     $userId = Auth::id();
            //     $builder->where('siswa_id', $userId);
            // });
        }        

        
        public function tahun_akademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'id_tahunakademik');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

}
