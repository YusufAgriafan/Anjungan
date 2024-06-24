<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrean;

class AntreanController extends Controller
{
    // Menampilkan halaman antrian
    public function index()
    {
        // Ambil kode antrian terakhir dari database untuk tipe 'A' dan 'B'
        $lastLoketCode = Antrean::where('code', 'LIKE', 'A%')->orderBy('created_at', 'desc')->first();
        $lastCsCode = Antrean::where('code', 'LIKE', 'B%')->orderBy('created_at', 'desc')->first();

        // Hitung kode antrian berikutnya
        $nextLoketCode = $lastLoketCode ? 'A' . (intval(substr($lastLoketCode->code, 1)) + 1) : 'A1';
        $nextCsCode = $lastCsCode ? 'B' . (intval(substr($lastCsCode->code, 1)) + 1) : 'B1';

        return view('index', compact('nextLoketCode', 'nextCsCode'));
    }

    // Membuat kode antrian baru
    public function create($type)
    {
        // Validasi tipe antrian
        if (!in_array($type, ['A', 'B'])) {
            return redirect()->back()->with('error', 'Tipe antrian tidak valid');
        }

        // Buat kode antrian baru berdasarkan tipe
        $lastCode = Antrean::where('code', 'LIKE', "$type%")->orderBy('created_at', 'desc')->first();
        $newNumber = $lastCode ? intval(substr($lastCode->code, 1)) + 1 : 1;
        $newCode = $type . $newNumber;

        // Simpan kode antrian baru ke database
        $antrean = new Antrean();
        $antrean->code = $newCode;
        $antrean->save();

        return redirect()->route('index')->with('success', 'Kode antrian baru telah dibuat');
    }

    // Metode untuk generate PDF (opsional)
    public function generatePDF()
    {
        // Implementasi untuk generate PDF
    }

    public function antrean()
    {
        $pendingAntreans = Antrean::where('served', false)->orderBy('created_at', 'asc')->take(3)->get();

        return view('antrean', compact('pendingAntreans'));
    }

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
}
