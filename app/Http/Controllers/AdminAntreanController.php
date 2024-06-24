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

        $imagePath = public_path('img/info/').$antrean->img_info;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $antrean->delete();

        return redirect()->route('admin.antrean.index')->with('success', 'Informasi Berhasil Dihapus!');
    }

    public function index($codeLoket)
    {
        return view('admin.antrean.index', [
            'code' => Antrean::where('code', $codeLoket)->get(),
            'codeLoket' => $codeLoket,
        ]);
    }

    // public function destroy($quiz_id, Antrean $question)
    // {
    //     $question->delete();

    //     $role = Auth::user()->role;

    //     return redirect()->route('admin.q.index', $quiz_id)->with('success', 'Question Berhasil Dihapus!');
    // }
}
