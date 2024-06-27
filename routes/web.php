<?php

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\AntreanController;
use App\Http\Controllers\TerlayaniController;
use App\Http\Controllers\AdminAntreanController;
use App\Http\Controllers\KartuBerobatController;

Route::get('/', [AntreanController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/create/{type}', [AntreanController::class, 'create'])->name('antrean.create');
Route::get('/generate-pdf', [AntreanController::class, 'generatePDF'])->name('generate.pdf');

Route::get('/antrean', [AntreanController::class, 'antrean'])->name('antrean');
Route::get('/cek-kartu-berobat', [KartuBerobatController::class, 'cekKartuBerobat'])->name('cek.kartu.berobat');
Route::post('/simpan', [DaftarController::class, 'simpanData'])->name('simpan.daftar');

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
    $pdf->setPaper('A7', 'portrait');
    $pdf->render();
    return $pdf->stream('document.pdf');
})->name('pdf');

Route::get('/daftar-pdf', function (Illuminate\Http\Request $request) {
    $no_rkm_medis = $request->input('no_rkm_medis');
    $nm_pasien = $request->input('nm_pasien');
    $metode_pembayaran = $request->input('metode_pembayaran');
    $tanggal_kunjungan = $request->input('tanggal_kunjungan');
    $kd_poli = $request->input('kd_poli');
    $kd_dokter = $request->input('kd_dokter');
    $alamat = $request->input('alamat');

    $dateTime = now()->format('Y-m-d H:i');
    $pdf = new Dompdf();
    $pdf->loadHtml(View::make('pdf_daftar', compact('no_rkm_medis', 'nm_pasien', 'dateTime','metode_pembayaran', 'tanggal_kunjungan',  'kd_poli', 'kd_dokter', 'alamat'))->render());
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    return $pdf->stream('daftar.pdf');
})->name('daftar.pdf');

Route::prefix('dashboard')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::name('loket.')->group(function () {
        Route::get('/loket', [loketController::class, 'index'])->name('index');
        Route::get('loket/show', [loketController::class, 'index'])->name('show');
        Route::get('loket/create', [loketController::class, 'create'])->name('create');
        Route::post('loket/store', [loketController::class, 'store'])->name('store');
        Route::get('loket/{codeLoket}/edit', [loketController::class, 'edit'])->name('edit');
        Route::put('loket/{codeLoket}/update', [loketController::class, 'update'])->name('update');
        Route::delete('loket/{codeLoket}/destroy', [loketController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/antrean')->name('antrean.')->group(function () {
        Route::get('/{codeLoket}', [AdminAntreanController::class, 'index'])->name('index');
        Route::get('/display/{codeLoket}', [AdminAntreanController::class, 'showTopAntrean'])->name('display');
        
        Route::post('/telat/{id}', [AdminAntreanController::class, 'telat'])->name('telat');
        Route::post('/serve/{id}', [AdminAntreanController::class, 'serve'])->name('serve');
        Route::put('/admin/antrean/{id}/ubah/{codeLoket}', [AdminAntreanController::class, 'ubah'])->name('ubah');
        Route::delete('/{id}', [AdminAntreanController::class, 'destroy'])->name('destroy');

    });

    Route::get('/panggil', [AdminAntreanController::class, 'panggil'])->name('panggil');

    Route::prefix('/terlayani')->name('serve.')->group(function () {
        Route::get('/', [TerlayaniController::class, 'index'])->name('index');

    });

});