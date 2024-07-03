<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Antrean;
use Illuminate\Http\Request;
use App\Events\AntreanUpdated;
use Illuminate\Support\Facades\Auth;
use Pusher;

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

    public function getUpdatedAntrean($codeLoket)
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

        $htmlContent = view('antrean', [
            'antreanNow' => $antreanNow,
            'topAntrean' => $topAntrean,
            'codeLoket' => $codeLoket,
        ])->render();

        return response()->json(['htmlContent' => $htmlContent]);
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

    // public function telat($id)
    // {
    //     $antrean = Antrean::findOrFail($id);
    //     $antrean->updated_at = now();
    //     $antrean->save();

    //     broadcast(new AntreanUpdated('hello world'))->toOthers();

    //     return redirect()->route('admin.antrean.index', $antrean->codeLoket)->with('success', 'Antrean diperbarui.');
    // }

    // public function telat($id)
    // {
    //     // event(new TestEvent('hello'));
    //     $antrean = array(
    //         'success'=>true,
    //         'message'=>'this is a test',
    //     );

    //     $antrean = array(
    //         'cluster' => 'ap1',
    //         'useTLS' => true
    //     );

    //     $pusher = new Pusher\Pusher(
    //         env('PUSHER_APP_KEY'),
    //         env('PUSHER_APP_SECRET'),
    //         env('PUSHER_APP_ID'),
    //     );
        
    //     $data['message'] = 'hello world. This is new message';
    //     $pusher->trigger('admin.antrean.index', 'events.AntreanUpdated', $data);
    // }

    // public function telat($id)
    // {
    //     $antrean = Antrean::findOrFail($id);
        
    //     $antrean->updated_at = now();
    //     $antrean->save();

    //     $pusher = new \Pusher\Pusher(
    //     env('PUSHER_APP_KEY'),
    //     env('PUSHER_APP_SECRET'),
    //     env('PUSHER_APP_ID'),
    //         [
    //         'cluster' => 'ap1',
    //         'useTLS' => true
    //         ]
    //     );
    //      $data['message'] = 'hello world. This is new message';
    //      $pusher->trigger('antrean-channel', 'events.AntreanUpdated', $data);
        
    //      return redirect()->route('admin.antrean.index', $antrean->codeLoket)->with('success', 'Antrean diperbarui.');
    // }

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

        $data = [
            'id' => $antrean->id,
            'code' => $antrean->code,
            'codeLoket' => $antrean->codeLoket,
            'updated_at' => $antrean->updated_at->toDateTimeString()
        ];
        
        $pusher->trigger('antrean-channel', 'events.AntreanUpdated', $data);
        
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
