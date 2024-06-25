<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Loket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAntreanController extends Controller
{
    public function daftarantrean()
    {
        $antrean = Antrean::latest()->get();;

        return view('admin.antrean', compact('antrean'));
    }

    public function index($codeLoket)
    {
        $antrean = Antrean::where('codeLoket', $codeLoket)
            ->where('served', 0)
            ->orderBy('updated_at', 'asc')
            ->get();

        return view('admin.antrean.index', [
            'antrean' => $antrean,
        ]);
    }

    public function panggil()
    {
        // Ambil semua data loket
        $lokets = Loket::all();
    
        // Inisialisasi array untuk menampung antrean berdasarkan loket
        $antreansByLoket = [];
    
        // Loop untuk setiap loket
        foreach ($lokets as $loket) {
            // Ambil antrean yang belum dilayani (served = 0) berdasarkan codeLoket
            $antreans = Antrean::where('served', 0)
                ->where('codeLoket', $loket->codeLoket)
                ->orderBy('updated_at', 'asc')
                ->get();
    
            // Tambahkan ke array $antreansByLoket dengan key berdasarkan codeLoket
            $antreansByLoket[$loket->codeLoket] = $antreans;
        }
    
        return view('admin.antrean.panggil', [
            'antreansByLoket' => $antreansByLoket, // Mengirimkan array antrean berdasarkan loket ke view
            'lokets' => $lokets, // Mengirimkan daftar loket ke view
        ]);
    }    

    public function telat($id)
    {
        $antrean = Antrean::findOrFail($id);
        $antrean->updated_at = now();
        $antrean->save();

        return redirect()->route('admin.antrean.index', $antrean->codeLoket)->with('success', 'Antrean diperbarui.');
    }

    public function destroy($id)
    {
        $antrean = Antrean::findOrFail($id);
        $codeLoket = $antrean->codeLoket;
        $antrean->delete();

        return redirect()->route('admin.antrean.index', $codeLoket)->with('success', 'Antrean berhasil dihapus.');
    }

    public function serve($id)
    {
        $antrean = Antrean::findOrFail($id);
        $antrean->served = 1;
        $antrean->updated_at = now();
        $antrean->save();

        // Redirect kembali ke halaman antrean dengan pesan sukses
        return redirect()->route('admin.antrean.index', $antrean->codeLoket)->with('success', 'Antrean telah dilayani.');
    }
}
