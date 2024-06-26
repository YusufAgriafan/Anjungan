<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_rkm_medis',
        'nm_pasien',
        'metode_pembayaran',
        'tanggal_kunjungan',
        'kd_poli',
        'kd_dokter',
        'alamat',
    ];
}
