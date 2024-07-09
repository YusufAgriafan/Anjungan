<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrean extends Model
{
    use HasFactory;

    public function daftar()
    {
        return $this->hasOne(Daftar::class, 'code', 'code');
    }
}
