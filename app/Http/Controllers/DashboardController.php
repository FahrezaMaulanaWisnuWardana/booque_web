<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            'msg'=>'Please Use Bearer token to use this key'
        ];
        \Mail::to($req->email)->send(new \App\Mail\sendMail($details));
        return redirect()->back()->withSuccess('Cek email untuk detail credentials API');
    }
    function users(){
        $data = [
            'user'=> DB::table('users')->select('id','name','email','level')->get()
        ];
        return view('dashboard.main.users.users',$data);
    }
    function addUser(){
        return view('dashboard.main.users.create');
    }
    function createUser(Request $req){
        request()->validate($rules = [
            'name' => 'required',
            'email'=>'required|email|unique:users',
            'password'=>['required','confirmed']
        ]);
        $validator = Validator::make($req->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $arr = [
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
            'level'=>$req->level
        ];
        try {
            User::create($arr);
            return redirect('dashboard/user')->withSuccess('Berhasil Ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    function userDelete($id){
        $user = User::find($id);
        $delete = $user->delete();
        if (!$delete) {
            return redirect('dashboard/user')->withErrors('Gagal hapus pengguna');
        }
        return redirect('dashboard/user')->withSuccess('Berhasil hapus pengguna');
    }
    function userEdit($id){
        $data=[
            'user' => User::where('id',$id)->first()
        ];
        return view('dashboard.main.users.update',$data);
    }
    function userUpdate(Request $req , $id){
        $user = User::where('id',$id)->first();
        if ($user->email !== $req->email) {
            request()->validate($rules = [
                'name' => 'required',
                'email'=>'required|email|unique:users'
            ]);
        }
        request()->validate($rules = [
            'name' => 'required',
            'email'=>'required|email'
        ]);
        $validator = Validator::make($req->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $arr =[
            'name'=>$req->name,
            'email'=>$req->email,
            'level'=>$req->level
        ];
        try {
            User::where('id',$id)->update($arr);
            return redirect('dashboard/user')->withSuccess('Berhasil ubah data pengguna');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getErrorMessage());
        }
    }
    function passwordUserEdit($id){
        $data=[
            'user' => User::where('id',$id)->first()
        ];
        return view('dashboard.main.users.update-pass',$data);
    }
    function passwordUserUpdate(Request $req , $id){
        $user = User::where('id',$id)->first();
        request()->validate($rules = [
            'password'=>['required','confirmed']
        ]);
        $validator = Validator::make($req->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        try {
            User::where('id',$id)->update(['password'=>Hash::make($req->password)]);
            return redirect('dashboard/user')->withSuccess('Berhasil ubah password pengguna');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getErrorMessage());
        }
    }
}
