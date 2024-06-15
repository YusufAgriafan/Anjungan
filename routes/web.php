<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('index');
});

Route::get('/form', function () {
    return view('contact');
});

Route::get('/daftar', [MainController::class, 'daftar'])->name('daftar');