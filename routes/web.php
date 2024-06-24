<?php

use App\Http\Controllers\AdminAntreanController;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AntreanController;
use App\Http\Controllers\LoketController;

Route::get('/', [AntreanController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/create/{type}', [AntreanController::class, 'create'])->name('antrean.create');
Route::get('/generate-pdf', [AntreanController::class, 'generatePDF'])->name('generate.pdf');

Route::get('/antrean', [AntreanController::class, 'antrean'])->name('antrean');

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

Route::prefix('dashboard')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/antrean', [AntreanController::class, 'daftarantrean'])->name('antrean.index');
    Route::delete('antrean/{code}/destroy', [AntreanController::class, 'destroy'])->name('antrean.destroy');
    
    Route::name('loket.')->group(function () {
        Route::get('/loket', [loketController::class, 'index'])->name('index');
        Route::get('loket/show', [loketController::class, 'index'])->name('show');
        Route::get('loket/create', [loketController::class, 'create'])->name('create');
        Route::post('loket/store', [loketController::class, 'store'])->name('store');
        Route::get('loket/{codeLoket}/edit', [loketController::class, 'edit'])->name('edit');
        Route::put('loket/{codeLoket}/update', [loketController::class, 'update'])->name('update');
        Route::delete('loket/{code}/destroy', [loketController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/antrean')->name('antrean.')->group(function () {
        Route::get('/{codeLoket}', [AdminAntreanController::class, 'index'])->name('index');
        Route::get('/{code}/create', [AdminAntreanController::class, 'create'])->name('create');
        Route::post('/{code}/store', [AdminAntreanController::class, 'store'])->name('store');
        Route::get('/{code}/{question}/edit', [AdminAntreanController::class, 'edit'])->name('edit');
        Route::post('/{code}/{question}/edit', [AdminAntreanController::class, 'update'])->name('update');
        Route::get('/{code}/{question}/destroy', [AdminAntreanController::class, 'destroy'])->name('destroy');
    });
});