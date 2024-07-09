<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function antrean()
    {
        return $this->belongsTo(Antrean::class, 'code', 'code');
    }

    protected $fillable = [
        'no_rkm_medis',
        'nm_pasien',
        'code',
        'metode_pembayaran',
        'tanggal_kunjungan',
        'kd_poli',
        'kd_dokter',
        'alamat',
    ];
}
