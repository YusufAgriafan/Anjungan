<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Daftar;
use App\Models\Dokter;
use App\Models\Antrean;
use App\Models\Poliklinik;
use Illuminate\Http\Request;

class AntreanController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        $polis = Poliklinik::all();

        $lastLoketCode = Antrean::where('code', 'LIKE', 'A%')->orderBy('created_at', 'desc')->first();
        $lastCsCode = Antrean::where('code', 'LIKE', 'B%')->orderBy('created_at', 'desc')->first();

        $nextLoketCode = $lastLoketCode ? 'A' . (intval(substr($lastLoketCode->code, 1)) + 1) : 'A1';
        $nextCsCode = $lastCsCode ? 'B' . (intval(substr($lastCsCode->code, 1)) + 1) : 'B1';

        return view('index', compact('nextLoketCode', 'nextCsCode', 'dokters', 'polis'));
    }
    
    public function create($type)
    {
        // Validasi tipe antrian
        if (!in_array($type, ['A', 'B'])) {
            return redirect()->back()->with('error', 'Tipe antrian tidak valid');
        }

        $lastCode = Antrean::where('code', 'LIKE', "$type%")->orderBy('created_at', 'desc')->first();
        $newNumber = $lastCode ? intval(substr($lastCode->code, 1)) + 1 : 1;
        $newCode = $type . $newNumber;

        $antrean = new Antrean();
        $antrean->code = $newCode;
        $antrean->codeLoket = $type;
        $antrean->save();

        $pusher = new \Pusher\Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            ]
        );

        $data['message'] = 'Data Diperbarui';
        $pusher->trigger('antrean-channel', 'events.AntreanUpdated', $data);

        // Event::dispatch(new AntreanUpdated($antrean));

        return redirect()->route('index')->with('success', 'Kode antrian baru telah dibuat');
    }

    public function generatePDF()
    {
        // Implementasi untuk generate PDF
    }


    public function tampilanDaftar()
    {
        // $dokter = Dokter::findOrFail($dokterId);
        // $daftars = Daftar::where('dokter_id', $dokterId)->with('pasien')->get();
        // return view('tampilan_daftar', compact('dokter', 'daftars'));

        $dokters = Dokter::with(['poli', 'daftars.pasien'])->get();
        return view('tampilan_daftar', compact('dokters'));
    }


    // public function antrean()
    // {
    //     $pendingAntreans = Antrean::where('served', false)->orderBy('created_at', 'asc')->take(3)->get();
    //     return view('antrean', compact('pendingAntreans'));
    // }

    public function antrean()
    {
        $lokets = Loket::all();

        $topAntrean = [];
        foreach ($lokets as $loket) {
            $antrean = Antrean::where('codeLoket', $loket->codeLoket)
                ->where('served', false)
                ->orderBy('updated_at', 'asc')
                ->first();
            $topAntrean[$loket->codeLoket] = $antrean;
        }

        $allAntrean = Antrean::where('served', false)
            ->orderBy('updated_at', 'asc')
            ->get();

        return view('antreanTest', [
            'topAntrean' => $topAntrean,
            'allAntrean' => $allAntrean,
        ]);
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
