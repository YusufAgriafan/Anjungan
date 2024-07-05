<?php

namespace App\Http\Controllers;

use Pusher;
use App\Models\Loket;
use App\Models\Antrean;
use Illuminate\Http\Request;
use App\Events\AntreanUpdated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminAntreanController extends Controller
{
    public function resetAntrean()
    {
        // Hapus semua data antrian
        Antrean::truncate();

        return redirect()->route('admin.index')->with('success', 'Antrian berhasil direset.');
    }

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
                    'codeLoket' => $codeLoket
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

    public function updateDaftarAntrean($codeLoket)
    {
        $antrean = Antrean::where('codeLoket', $codeLoket)
        ->where('served', 0)
        ->orderBy('updated_at', 'asc')
        ->get();

        // Log::info('Antrean Data:', ['antrean' => $antrean]);
        return view('admin.antrean.index_partial', [
            'antrean' => $antrean,
            'codeLoket' => $codeLoket
        ]);
        
    }

    public function updateDaftarAntrean2($codeLoket)
    {
        $allAntrean = Antrean::where('served', 0)
            ->orderBy('updated_at', 'asc')
            ->get();

        $filteredAntrean = Antrean::where('codeLoket', $codeLoket)
            ->where('served', 0)
            ->orderBy('updated_at', 'asc')
            ->get();

        return view('admin.antrean.tambahan_partial', [
            'allAntrean' => $allAntrean,
            'filteredAntrean' => $filteredAntrean,
            'codeLoket' => $codeLoket,
        ]);
        
    }

    public function test($codeLoket)
    {
            $antreanNow = Antrean::where('codeLoket', $codeLoket)
                ->where('served', 0)
                ->orderBy('updated_at', 'asc')
                ->take(1)
                ->get();

            $allAntrean = Antrean::where('served', 0)
                ->orderBy('updated_at', 'asc')
                ->get();

            return view('antrean', [
                'antreanNow' => $antreanNow,
                'allAntrean' => $allAntrean,
                'codeLoket' => $codeLoket,
            ]);
        
    }

    public function showTopAntrean($codeLoket)
    {
        $antreanNow = Antrean::where('codeLoket', $codeLoket)
            ->where('served', false)
            ->orderBy('updated_at', 'asc')
            ->first();

        $lokets = Loket::all();

        $topAntrean = [];
        foreach ($lokets as $loket) {
            $antrean = Antrean::where('codeLoket', $loket->codeLoket)
                ->where('served', false)
                ->orderBy('updated_at', 'asc')
                ->first();
            $topAntrean[$loket->codeLoket] = $antrean;
        }

        return view('antrean', [
            'antreanNow' => $antreanNow,
            'topAntrean' => $topAntrean,
            'codeLoket' => $codeLoket,
        ]);
    }

    public function updateAntrean($codeLoket)
    {
        $antreanNow = Antrean::where('codeLoket', $codeLoket)
            ->where('served', false)
            ->orderBy('updated_at', 'asc')
            ->first();

        $lokets = Loket::all();

        $topAntrean = [];
        foreach ($lokets as $loket) {
            $antrean = Antrean::where('codeLoket', $loket->codeLoket)
                ->where('served', false)
                ->orderBy('updated_at', 'asc')
                ->first();
            $topAntrean[$loket->codeLoket] = $antrean;
        }

        // Asumsikan view partial 'antrean_partial' hanya berisi konten untuk elemen #read
        return view('antrean_partial', [
            'antreanNow' => $antreanNow,
            'topAntrean' => $topAntrean,
            'codeLoket' => $codeLoket,
        ]);
    }

    public function panggil()
    {
        $lokets = Loket::all();
        $antreansByLoket = [];
    
        foreach ($lokets as $loket) {
            $antreans = Antrean::where('served', 0)
                ->where('codeLoket', $loket->codeLoket)
                ->orderBy('updated_at', 'asc')
                ->get();
            $antreansByLoket[$loket->codeLoket] = $antreans;
        }
    
        return view('admin.antrean.panggil', [
            'antreansByLoket' => $antreansByLoket,
            'lokets' => $lokets, 
        ]);
    }    

    public function telat($id)
    {
        $antrean = Antrean::findOrFail($id);
        
        $antrean->updated_at = now();
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
        
        return redirect()->route('admin.antrean.index', $antrean->codeLoket)->with('success', 'Antrean diperbarui.');
    }


    public function destroy($id)
    {
        $antrean = Antrean::findOrFail($id);
        $codeLoket = $antrean->codeLoket;
        $antrean->delete();

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

        return redirect()->route('admin.antrean.index', $codeLoket)->with('success', 'Antrean berhasil dihapus.');
    }

    public function serve($id)
    {
        $antrean = Antrean::findOrFail($id);
        $antrean->served = 1;
        $antrean->updated_at = now();
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

        return redirect()->route('admin.antrean.index', $antrean->codeLoket)->with('success', 'Antrean telah dilayani.');
    }

    public function ubah($id, $codeLoket)
{
    $antrean = Antrean::findOrFail($id);

    $antrean->codeLoket = $codeLoket;
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

    return redirect()->route('admin.antrean.index', $codeLoket)->with('success', 'Antrean diperbarui.');
}
}
