<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    use HasFactory;

    protected $table = 'polikliniks';

    public function dokters()
    {
        return $this->hasMany(Dokter::class, 'kd_poli', 'kd_poli');
    }
}
