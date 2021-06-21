<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BannerModel;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'banner'=>BannerModel::all()
        ];
        return view('dashboard.main.banner.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.main.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate($rules = [
            "tittle"=>"required",
            "image"=>"required|mimes:jpg,png,jpeg",
        ]);
        try {
            $request->file('image')->storeAs('banner',$request->file('image')->getClientOriginalName());
            $arr = [
                    'tittle'=>$request->tittle,
                    'image'=>$request->file('image')->getClientOriginalName(),
                    'is_active'=>"1",
                    'created_at'=>date('Y-m-d')
            ];
            BannerModel::insert($arr);
            return redirect()->route('banner.index')->withSuccess('Berhasil Tambah Banner');
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
            'banner'=>BannerModel::where('id',$id)->first()
        ];
        return view('dashboard.main.banner.edit',$data);
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
        // Check Image Thumbnail
        if ($request->file('image')===NULL) {
            try {
                $arr = [
                    'tittle'=>$request->tittle,
                    'is_active'=>$request->is_active,
                ];
                BannerModel::where('id',$id)->update($arr);
                return redirect()->route('banner.index')->withSuccess('Berhasil Ubah Banner');
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
        }else{
            try {
                request()->validate($rules = [
                    "tittle"=>"required",
                    "image"=>"mimes:jpg,png,jpeg",
                ]);
                $request->file('image')->storeAs('banner',$request->file('image')->getClientOriginalName());
                $arr = [
                    'tittle'=>$request->tittle,
                    'image'=>$request->file('image')->getClientOriginalName(),
                    'is_active'=>$request->is_active
                ];
                BannerModel::where('id',$id)->update($arr);
                return redirect()->route('banner.index')->withSuccess('Berhasil Ubah Banner');
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
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
        $delete = BannerModel::where('id',$id)->delete();
        if(!$delete){
            return redirect()->back()->withErrors('Gagal hapus data');
        }
        return redirect()->back()->withSuccess('Berhasil hapus data');
    }
}
