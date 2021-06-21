<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ProvinceModel;
use App\Models\City;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'city'=>DB::table('city')
            ->select('city.id','province.province_name','city.city_name','city.latitude','city.longitude')
            ->join('province','province.id','=','city.province_id')->get()
        ];
        return view('dashboard.main.location.city.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'province'=>ProvinceModel::all()
        ];
        return view('dashboard.main.location.city.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'province_id' => 'required',
            'city_name'=>'required|unique:city',
            'latitude'=>'required|numeric',
            'longitude'=>'required|numeric'
        ]);
        try {
            City::insert($request->all('province_id','city_name','latitude','longitude'));
            return redirect()->route('city.index')->withSuccess('Berhasil Tambah Kota');
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
        //
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
            'province'=>ProvinceModel::all(),
            'city'=>DB::table('city')
            ->select('city.id','city.province_id','province.province_name','city.city_name','city.latitude','city.longitude')
            ->join('province','province.id','=','city.province_id')->where('city.id',$id)->first()
        ];
        return view('dashboard.main.location.city.edit',$data);
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
        $city = City::where('id',$id)->first();
        if($city->city_name !== $request->city_name){
            request()->validate([
                'province_id' => 'required',
                'city_name'=>'required|unique:city',
                'latitude'=>'required|numeric',
                'longitude'=>'required|numeric'
            ]);
        }
        request()->validate([
            'province_id' => 'required',
            'city_name'=>'required',
            'latitude'=>'required|numeric',
            'longitude'=>'required|numeric'
        ]);
        try {
            City::where('id',$id)->update($request->all('province_id','city_name','latitude','longitude'));
            return redirect()->route('city.index')->withSuccess('Berhasil Ubah Kota');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
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
        $delete = City::where('id',$id)->delete();
        if(!$delete){
            return redirect()->back()->withErrors('Gagal hapus data');
        }
        return redirect()->back()->withSuccess('Berhasil hapus data');
    }
}
