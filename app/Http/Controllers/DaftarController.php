<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function simpanData(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'no_rkm_medis' => 'required|string',
                'nm_pasien' => 'required|string',
                'metode_pembayaran' => 'required|string',
                'tanggal_kunjungan' => 'required|date',
                'kd_poli' => 'required|string',
                'kd_dokter' => 'required|string',
                'alamat' => 'required|string',
            ]);

            // Simpan data pendaftaran ke database
            $daftar = Daftar::create($validatedData);

            if (!$daftar) {
                return response()->json([
                    'success' => false,
                    'error' => 'Gagal menyimpan data pendaftaran.'
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran berhasil disimpan.',
                'data' => $daftar,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Pendaftaran gagal disimpan: ' . $e->getMessage(),
            ]);
        }
    }
}
