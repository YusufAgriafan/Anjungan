<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuBerobat extends Model
{
    use HasFactory;

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
