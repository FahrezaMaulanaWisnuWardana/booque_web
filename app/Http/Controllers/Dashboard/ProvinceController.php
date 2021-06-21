<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProvinceModel;
class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'province'=>ProvinceModel::all()
        ];
        return view('dashboard.main.location.province.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.main.location.province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(['province_name' => 'required|unique:province']);
        try {
            ProvinceModel::insert($request->all('province_name'));
            return redirect()->route('province.index')->withSuccess('Berhasil Tambah Provinsi');
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
            'province'=>ProvinceModel::where('id',$id)->first()
        ];
        return view('dashboard.main.location.province.edit',$data);
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
        $province = ProvinceModel::where('id',$id)->first();
        if($province->province_name !== $request->province_name){
            request()->validate(['province_name' => 'required|unique:province']);
        }
        request()->validate(['province_name' => 'required']);
        try {
            ProvinceModel::where('id',$id)->update($request->all('province_name'));
            return redirect()->route('province.index')->withSuccess('Berhasil Ubah Provinsi');
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
        $delete = ProvinceModel::where('id',$id)->delete();
        if(!$delete){
            return redirect()->back()->withErrors('Gagal hapus data');
        }
        return redirect()->back()->withSuccess('Berhasil hapus data');
    }
}
