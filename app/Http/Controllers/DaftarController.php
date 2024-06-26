<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function simpanPendaftaran(Request $request)
    {
        $data = $request->all();
        // $request->validate([
        //     'no_rkm_medis' => 'required',
        //     'nm_pasien' => 'required',
        //     // tambahkan aturan validasi lainnya
        // ]);

        Daftar::create($data);

        return response()->json(['success' => true]);
    }
}
