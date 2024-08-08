<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Api extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'no_kartu_berobat',
        'no_rkm_medis',
        'nm_pasien',
    ];
}
