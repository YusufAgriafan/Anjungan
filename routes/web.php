<?php

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AntreanController;

Route::get('/test', [MainController::class, 'test'])->name('test');

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
    

});