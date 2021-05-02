<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\Booqers;
use App\Models\Booqers_d;

class BooqersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $booqers = new Booqers;
        $booqers_d = new Booqers_d;

        $rules = [
            "nama"=>"min:5|max:50|required",
            "email"=>"required",
            "password"=>"required"
        ];
        $data = Booqers::where("email",$request->email)->count();
        if ($data>0) {
            return response([
                'response'=>'Duplicate Email'
            ], 400)->header('Content-Type', 'application/json');
        }else{
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return $validator->errors();
            }else{

                $booqers->email = $request->email;
                $booqers->password = Hash::make($request->password);
                $booqers->login_type = $request->type;
                $result = $booqers->save();
                if($result){
                    $booqers_d->user_id = $booqers->id;
                    $booqers_d->full_name = $request->nama;
                    $save = $booqers_d->save();
                    if ($save) {
                        return response([
                            'response'=>'success'
                        ], 200)->header('Content-Type', 'application/json');
                    }else{
                        return response([
                            'response'=>'Something Wrong'
                        ], 400)->header('Content-Type', 'application/json');
                    }
                }else{
                        return response([
                            'response'=>'Proses Failed'
                        ], 400)->header('Content-Type', 'application/json');
                }
            }   
        }
    }
    // public function store_oauth(Request $request)
    // {
    //     $booqers = new Booqers;
    //     $booqers_d = new Booqers_d;

    //     $rules = [
    //         "nama"=>"min:5|max:50|required",
    //         "email"=>"required",
    //     ];

    //     $data = Booqers::where("email",$request->email)->count();
    //     if ($data>0) {
    //         return response([
    //             'debug_msg'=>'Email is already registered'
    //         ], 400)->header('Content-Type', 'application/json');
    //     }else{
    //         $validator = Validator::make($request->all(),$rules);
    //         if ($validator->fails()) {
    //             return $validator->errors();
    //         }else{
    //             $booqers->email = $request->email;
    //             $booqers->login_type = 'oauth';
    //             $result = $booqers->save();
    //             if($result){
    //                 $booqers_d->user_id = $booqers->id;
    //                 $booqers_d->full_name = $request->nama;
    //                 $save = $booqers_d->save();
    //                 if ($save) {
    //                     return response([
    //                         'debug_msg'=>'success'
    //                     ], 200)->header('Content-Type', 'application/json');
    //                 }else{
    //                     return response([
    //                         'debug_msg'=>'Something Wrong'
    //                     ], 400)->header('Content-Type', 'application/json');
    //                 }
    //             }else{
    //                     return response([
    //                         'debug_msg'=>'Proses Failed'
    //                     ], 400)->header('Content-Type', 'application/json');
    //             }
    //         }
    //     }

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {   
        $data = Booqers_d::find($req->id);
        if ($data!==null) {
            return ["result"=>$data];
        }else{
            return ["debug_msg"=>"User Not Found"];
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $profile = Booqers_d::find($id);
     
        if($profile!==null){
            $profile->full_name = ($request->full_name===null)?$profile->full_name:$request->full_name;
            $profile->address = ($request->address===null)?$profile->address:$request->address;
            $profile->phone = ($request->phone===null)?$profile->phone:$request->phone;
            $profile->city_id = ($request->city_id===null)?$profile->city_id:$request->city_id;
            $profile->province_id = ($request->province_id===null)?$profile->province_id:$request->province_id;
            $result = $profile->save();
            if ($result) {
                return ["debug_msg"=>"Update Success"];
            }else{
                return ["debug_msg"=>"Update Failed"];
            }
        }else{
            return ["debug_msg"=>"User Not Found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
