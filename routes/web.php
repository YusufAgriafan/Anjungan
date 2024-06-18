<?php

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('index');
});

Route::get('/form', function () {
    return view('contact');
});

Route::get('/daftar', [MainController::class, 'daftar'])->name('daftar');

Route::get('/generate-pdf', function () {
    $pdf = new Dompdf();
    $pdf->loadHtml(View::make('pdf')->render());

    // (Opsional) Atur ukuran dan orientasi dokumen
    $pdf->setPaper('A4', 'portrait');

    // Render PDF (menggunakan method stream untuk output langsung)
    $pdf->render();
    
    // Tampilkan PDF ke browser
    return $pdf->stream('document.pdf');
});

