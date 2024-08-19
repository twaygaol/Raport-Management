<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kelas',
    ];

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'id_kelas');
    }
}
