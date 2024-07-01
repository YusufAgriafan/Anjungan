<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\AntreanUpdated;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function daftar()
    {
        return view('daftar');
    }

    public function test()
    {
        broadcast(new AntreanUpdated('hello world'))->toOthers();   
        return view('admin.test');
    }

    
}
