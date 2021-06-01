<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class DashboardController extends Controller
{
    function index(){
        $data = [
            'apikey'=> DB::table('personal_access_tokens')->select('name')->get()
        ];
        return view('dashboard.main.index',$data);
    }
    function generateKey(Request $req){
        $user= User::where('email', $req->email)->first();
        $token = explode("|", $user->createToken($req->keyname)->plainTextToken);
        $response = [
            'user' => $user,
            'token' => $token,
            'msg'=>'Please check your email for details credentials'
        ];
        $details = [
            'title' => 'Detail API credentials',
            'name' => $req->keyname,
            'key' => $token[1],
            'note'=>'Please Use Bearer token to use this key'
        ];
        \Mail::to($req->email)->send(new \App\Mail\sendMail($details));
        return redirect()->back()->withSuccess('Cek email untuk detail credentials API');
    }
    function users(){
        $data = [
            'user'=> DB::table('users')->select('id','name','email','level')->get()
        ];
        return view('dashboard.main.users',$data);
    }
}
