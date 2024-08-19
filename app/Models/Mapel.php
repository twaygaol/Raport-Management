<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['kikd_mapel', 'name_mapel'];

    public function nilais()
    {
        return $this->hasMany(Mapel::class, 'id_mapel');
    }
}
