<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LoketController extends Controller
{
    public function index()
    {
        $loket = loket::latest()->get();

        return view('admin.loket.index', compact('loket'));
    }

    public function create()
    {
        return view('admin.loket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codeLoket' => ['required', 'regex:/^[a-zA-Z]$/'], // Ensure code is a single letter
        ]);

        $input = $request->all();

        try {
            Loket::create($input);
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
            
            return redirect()->route('admin.loket.index')->with('success', 'Loket Berhasil Ditambahkan!');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation
                return redirect()->back()->withErrors(['codeLoket' => 'Kode Harus Unik']);
            }
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan yang tidak terduga. Silakan coba lagi.']);
        }
    }

    public function edit($codeLoket)
    {
        $loket = loket::where('id', $codeLoket)->get();
        if ($loket->isEmpty()) {
            abort(404);
        }
        $item = $loket->first();

        return view('admin.loket.edit', compact('item'));
    }

    public function update(Request $request, $codeLoket)
    {
        $request->validate([
            'codeLoket' => 'required',
        ]);

        $loket = loket::where('codeLoket', $codeLoket)->firstOrFail();
        $loket->codeLoket = $request->input('codeLoket');
        $loket->save();

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

        return redirect()->route('admin.loket.index')->with('success', 'Loket Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $loket = loket::findOrFail($id);

        $loket->delete();

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

        return redirect()->route('admin.loket.index')->with('success', 'Loket Berhasil Dihapus!');
    }
}
