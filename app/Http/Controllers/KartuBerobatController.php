<?php

namespace App\Http\Controllers;

use App\Models\KartuBerobat;
use Illuminate\Http\Request;

class KartuBerobatController extends Controller
{
    public function cekKartuBerobat(Request $request)
    {
        $no_kartu_berobat = $request->input('no_kartu_berobat');
        $kartu = KartuBerobat::where('no_kartu_berobat', $no_kartu_berobat)->first();

        if ($kartu) {
            return response()->json(['exists' => true, 'kartu' => $kartu]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
}
