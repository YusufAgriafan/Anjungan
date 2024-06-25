<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
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
        if ($codeLoket === 'A' || $codeLoket === 'B') {
            $antrean = Antrean::where('codeLoket', $codeLoket)
                ->where('served', 0)
                ->orderBy('updated_at', 'asc')
                ->get();
                return view('admin.antrean.index', [
                    'antrean' => $antrean,
                ]);
        } else {
            $allAntrean = Antrean::where('served', 0)
                ->orderBy('updated_at', 'asc')
                ->get();

            $filteredAntrean = Antrean::where('codeLoket', $codeLoket)
                ->where('served', 0)
                ->orderBy('updated_at', 'asc')
                ->get();

            return view('admin.antrean.tambahan', [
                'allAntrean' => $allAntrean,
                'filteredAntrean' => $filteredAntrean,
                'codeLoket' => $codeLoket,
            ]);
        }
        
    }


    public function panggil()
    {
        $antrean = Antrean::where('served', 0)
            ->orderBy('updated_at', 'asc')
            ->get();

        return view('admin.antrean.panggil', [
            'antrean' => $antrean,
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

        return redirect()->route('admin.antrean.index', $antrean->codeLoket)->with('success', 'Antrean telah dilayani.');
    }

    public function ubah($id, $codeLoket)
{
    $antrean = Antrean::findOrFail($id);

    $antrean->codeLoket = $codeLoket;
    $antrean->save();

    return redirect()->route('admin.antrean.index', $codeLoket)->with('success', 'Antrean diperbarui.');
}
}
