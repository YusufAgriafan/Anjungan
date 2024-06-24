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

        if (Auth::attempt($credentials)) {
            if (Auth::user()->email_verified_at !== null) {
                $request->session()->regenerate();

                return redirect()->route('admin.loket.index');
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

        return redirect()->route('index');
    }
}
