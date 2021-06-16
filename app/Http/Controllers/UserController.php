<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        if (!Auth::user()) {
            return view('dashboard.auth.login');
        }
            return redirect('dashboard');
    }
    function prosesLogin(Request $request){
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
        return redirect('booque-login')->withErrors('Oppes! Silahkan Cek Inputanmu');
    }
    function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('booque-login');
    }
}