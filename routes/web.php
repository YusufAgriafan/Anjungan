<?php

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// Route::get('/', function () {
//     return view('index');
// });

use App\Http\Controllers\AntreanController;

Route::get('/', [AntreanController::class, 'index'])->name('index');
Route::get('/create/{type}', [AntreanController::class, 'create'])->name('antrean.create');
Route::get('/generate-pdf', [AntreanController::class, 'generatePDF'])->name('generate.pdf');


Route::get('/form', function () {
    return view('contact');
});

Route::get('/daftar', [MainController::class, 'daftar'])->name('daftar');

Route::get('/generate-pdf', function (Illuminate\Http\Request $request) {
    $number = $request->input('number');
    $type = $request->input('type');
    $dateTime = now()->format('Y-m-d H:i');
    
    $pdf = new Dompdf();
    $pdf->loadHtml(View::make('pdf', compact('number', 'type', 'dateTime'))->render());

    // (Opsional) Atur ukuran dan orientasi dokumen
    $pdf->setPaper('A7', 'portrait');

    // Render PDF (menggunakan method stream untuk output langsung)
    $pdf->render();
    
    // Tampilkan PDF ke browser
    return $pdf->stream('document.pdf');
})->name('pdf');

Route::get('/adm', function () {
    return view('admin.admin');
});