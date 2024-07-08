<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\KartuBerobat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
    // public function simpanData(Request $request)
    // {
    //     try {
    //         // Validasi input
    //         $validatedData = $request->validate([
    //             'no_rkm_medis' => 'required|string',
    //             'nm_pasien' => 'required|string',
    //             'metode_pembayaran' => 'required|string',
    //             'tanggal_kunjungan' => 'required|date',
    //             'kd_poli' => 'required|string',
    //             'kd_dokter' => 'required|string',
    //             'alamat' => 'required|string',
    //         ]);

    //         DB::beginTransaction();

    //         $pasien = Pasien::updateOrCreate(
    //             ['no_rkm_medis' => $validatedData['no_rkm_medis']],
    //             ['nm_pasien' => $validatedData['nm_pasien'], 'alamat' => $validatedData['alamat']]
    //         );

    //         $daftar = Daftar::create([
    //             'pasien_id' => $pasien->id,
    //             'metode_pembayaran' => $validatedData['metode_pembayaran'],
    //             'tanggal_kunjungan' => $validatedData['tanggal_kunjungan'],
    //             'kd_poli' => $validatedData['kd_poli'],
    //             'dokter_id' => Dokter::where('nama', $validatedData['kd_dokter'])->value('id'),
    //         ]);

    //         DB::commit();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Pendaftaran berhasil disimpan.',
    //             'data' => $daftar,
    //         ]);

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json([
    //             'success' => false,
    //             'error' => 'Pendaftaran gagal disimpan: ' . $e->getMessage(),
    //         ]);
    //     }
    // }

    public function simpanData(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'no_rkm_medis' => 'required|string',
                'nm_pasien' => 'required|string',
                'metode_pembayaran' => 'required|string',
                'tanggal_kunjungan' => 'required|date',
                'kd_poli' => 'required|string',
                'kd_dokter' => 'required|string',
                'alamat' => 'required|string',
            ]);

            $kartuBerobat = KartuBerobat::where('no_kartu_berobat', $validatedData['no_rkm_medis'])->first();

            if (!$kartuBerobat) {
                return response()->json([
                    'success' => false,
                    'error' => 'Nomor Kartu Berobat tidak ditemukan.',
                ]);
            }

            $daftar = Daftar::create([
                'pasien_id' => $kartuBerobat->pasien_id,
                'metode_pembayaran' => $validatedData['metode_pembayaran'],
                'tanggal_kunjungan' => $validatedData['tanggal_kunjungan'],
                'kd_poli' => $validatedData['kd_poli'],
                'dokter_id' => Dokter::where('nama', $validatedData['kd_dokter'])->value('id'),
                'alamat' => $validatedData['alamat'],
            ]);

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
