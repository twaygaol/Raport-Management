<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'nisn',
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
        'email_orangtua',
        'nohp_orangtua',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tgl_lhr' => 'date',
        'jk' => 'string',
        'sts_anak' => 'string',
    ];
}
