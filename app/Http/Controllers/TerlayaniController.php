<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use Illuminate\Http\Request;

class TerlayaniController extends Controller
{
    public function index()
    {
        $antrean = Antrean::latest()
            ->where('served', 1)
            ->orderBy('updated_at', 'asc')
            ->get();

        return view('admin.serve.index', [
            'antrean' => $antrean,
        ]);
    }
}
