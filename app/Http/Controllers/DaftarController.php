<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
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
                'kd_dokter' => 'required|integer',
                'kd_antrean' => 'required|string',
                'alamat' => 'required|string',
            ]);

            $antrean = Antrean::where('code', $validatedData['kd_antrean'])->first();
            $pasien = Pasien::where('no_rkm_medis', $validatedData['no_rkm_medis'])->first();

            if (!$antrean) {
                return response()->json([
                    'success' => false,
                    'error' => 'Nomor Antrean tidak ditemukan, ambil nomor terlebih dahulu di menu Antrean.',
                ]);
            }

            if (!$pasien) {
                return response()->json([
                    'success' => false,
                    'error' => 'Nomor Rekam Medik tidak ditemukan.',
                ]);
            }
            $dokterId = $validatedData['kd_dokter'];

            // $daftarExist = Daftar::where('code', $validatedData['kd_antrean'])->first();
            // if ($daftarExist) {
            //     return response()->json([
            //         'success' => false,
            //         'error' => 'Kode antrean sudah digunakan, silakan ambil nomor antrean baru.',
            //     ]);
            // }

            $daftar = new Daftar;
            $daftar->pasien_id = $pasien->id;
            $daftar->code = $antrean->code;
            $daftar->dokter_id = $dokterId;
            $daftar->metode_pembayaran = $request->metode_pembayaran;
            $daftar->tanggal_kunjungan = $request->tanggal_kunjungan;
            $daftar->kd_poli = $request->kd_poli;
            $daftar->alamat = $request->alamat;
            $daftar->save();

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
