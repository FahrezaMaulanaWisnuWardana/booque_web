<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Booqers;
use App\Models\Booqers_d;
use App\Models\ProvinceModel;
use App\Models\City;
class BooqersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user'=>DB::table('booqers')->select('id','email','is_active','login_type')->get()
        ];
        return view('dashboard.main.booqers.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data=[
            'city'=>City::all()
        ];
        return view('dashboard.main.booqers.create',$data);
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
        request()->validate($rules = [
            'email'=>'required|email|unique:booqers',
            'password'=>['required','confirmed'],
            'name' => 'required',
            'address' => 'required',
            'phone'=>'required|numeric|digits_between:11,13',
            'city' => 'required'
        ]);
        $booqers->email = $request->email;
        $booqers->password = Hash::make($request->password);
        try {
            $result = $booqers->save();
            $loc = explode(" ", $request->city);
            $arr = [
                'user_id' => $booqers->id,
                'full_name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'city_id' => $loc[0],
                'province_id' => $loc[1],
            ];
            Booqers_d::insert($arr);
            return redirect()->route('booqer.index')->withSuccess('Berhasil Tambah Booqer');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'user'=>DB::table('booqers_d')
                        ->select('booqers.id','booqers.email','booqers.is_active','booqers.login_type','booqers_d.full_name','booqers_d.address','booqers_d.phone','city.city_name','province.province_name')
                        ->join('booqers','booqers_d.user_id','=','booqers.id')
                        ->join('city','booqers_d.city_id','=','city.id')
                        ->join('province','booqers_d.province_id','=','province.id')
                        ->where('booqers_d.user_id',$id)->first()
        ];
        return view('dashboard.main.booqers.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'user'=>DB::table('booqers')->select('id','email','is_active','login_type','full_name','address','phone','city_id')->join('booqers_d','booqers_d.user_id','=','booqers.id')->where('id',$id)->first(),
            'city'=>City::all()
        ];
        return view('dashboard.main.booqers.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Booqers::where('id',$id)->first();
        $user_d = Booqers_d::where('user_id',$id)->first();
        request()->validate($rules = [
            'email'=>($user->email !== null && $user->email === $request->email) ? 'required|email' : 'required|email|unique:booqers',
            'name' => 'required',
            'address' => 'required',
            'phone'=>($user_d->phone !== null && $user_d->phone === $request->phone) ? 'required|numeric|digits_between:11,13' : 'required|numeric|unique:booqers_d|digits_between:11,13',
            'city' => 'required'
        ]);

        try {
            Booqers::where('id',$id)->update($request->all('email','is_active'));
            $loc = explode(" ", $request->city);
            $arr = [
                'full_name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'city_id' => $loc[0],
                'province_id' => $loc[1]
            ];
            Booqers_d::where('user_id',$id)->update($arr);
            return redirect()->route('booqer.index')->withSuccess('Berhasil Edit Booqer');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Booqers::where('id',$id)->delete();
        if(!$delete){
            return redirect()->back()->withErrors('Gagal hapus data');
        }
        return redirect()->route('booqer.index')->withSuccess('Berhasil hapus data');
    }
}
