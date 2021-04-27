<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booqers;
use App\Models\Booqers_d;

class LoginAppController extends Controller
{
    public function login(Request $request){
        $booqers = new Booqers;
        $booqers_d = new Booqers_d;

        $user = Booqers::where("email",$request->email)->first();
        if (!$user || !Hash::check($request->password,$user->password)){
            return response([
                'debug_msg'=>'Data is not match in our record.'
            ],400);
        }else{
            $user_d = Booqers_d::where("user_id",$user->user_id)->first();
            return response(["user"=>$user_d],200);
        }
    }
    public function login_oauth(Request $request){
        $booqers = new Booqers;
        $booqers_d = new Booqers_d;
        $user = Booqers::where("email",$request->email)->first();
        
            if (!$user){
                return response([
                    'debug_msg'=>'Data is not match in our record.'
                ],400);
            }else{
                $user_d = Booqers_d::where("user_id",$user->user_id)->first();
                if ($user->login_type==="oauth") {
                    return response(["user"=>$user_d],200);
                }else{
                    return response([
                        'debug_msg'=>'Please login using email and password'
                    ],400);
                }
            }
    }
}
