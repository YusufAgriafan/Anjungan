<?php

namespace App\Http\Controllers\Api;

use App\Models\Api;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password'])
        ]);

        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);
    }

    public function login(Request $request)
    {
        $attrs = $request->validate([
            'no_kartu_berobat' => 'required|exists:apis,no_kartu_berobat',
            'no_rkm_medis' => 'required|exists:apis,no_rkm_medis',
        ]);

        $api = Api::where('no_kartu_berobat', $attrs['no_kartu_berobat'])
                    ->where('no_rkm_medis', $attrs['no_rkm_medis'])
                    ->first();

        if (!$api) {
            return response()->json([
                'message' => 'Invalid credentials.'
            ], 403);
        }

        return response()->json([
            'api' => $api,
            'token' => $api->createToken('secret')->plainTextToken
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout Success.'
        ], 200);
    }

    public function user()
    {
        return response()->json([
            'api' => auth()->user()
        ], 200);
    }
    
}
