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

    public function destroy($id)
    {
        $antrean = antrean::findOrFail($id);

        $antrean->delete();

        return redirect()->route('admin.antrean.index')->with('success', 'Antrean Berhasil Dihapus!');
    }

    public function index($codeLoket)
    {
        // Mengambil antrean dan mengurutkan berdasarkan updated_at dari yang paling lama
        $antrean = Antrean::where('codeLoket', $codeLoket)
            ->orderBy('updated_at', 'asc')
            ->get();

        return view('admin.antrean.index', [
            'antrean' => $antrean,
        ]);
    }

    public function telat($id)
    {
        // Mengambil antrean berdasarkan ID dan mengupdate updated_at ke waktu saat ini
        $antrean = Antrean::findOrFail($id);
        $antrean->updated_at = now();
        $antrean->save();

        // Redirect kembali ke halaman antrean dengan pesan sukses
        return redirect()->route('admin.antrean.index', $antrean->codeLoket)->with('success', 'Antrean diperbarui.');
    }
    // public function destroy($quiz_id, Antrean $question)
    // {
    //     $question->delete();

    //     $role = Auth::user()->role;

    //     return redirect()->route('admin.q.index', $quiz_id)->with('success', 'Question Berhasil Dihapus!');
    // }
}
