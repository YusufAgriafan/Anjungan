<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah kredensial benar
        if (Auth::attempt($credentials)) {
            // Periksa apakah pengguna telah diverifikasi
            if (Auth::user()->email_verified_at !== null) {
                $request->session()->regenerate();

                return back()->with('success', 'Login Berhasil');
            } else {
                Auth::logout();

                return back()->with('error', 'Akun belum diverifikasi. Silakan periksa email Anda untuk tautan verifikasi.');
            }
        }

        return back()->with('error', 'Email atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
