<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryModel;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'book_category'=>CategoryModel::all()
        ];
        return view('dashboard.main.book_category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.main.book_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        request()->validate(['category' => 'required']);
        $data = [
            'category_name'=>$request->category
        ];
        try {
            CategoryModel::insert($data);
            return redirect()->route('book-category.index')->withSuccess('Berhasil Tambah Category');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'category'=>CategoryModel::where('id',$id)->first()
        ];
        return view('dashboard.main.book_category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(['category' => 'required']);
        $data = [
            'category_name'=>$request->category
        ];
        try {
            CategoryModel::where('id',$id)->update($data);
            return redirect()->route('book-category.index')->withSuccess('Berhasil Ubah Category');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = categoryModel::find($id)->delete();
        if(!$delete){
            return redirect()->back()->withErrors('Gagal hapus data');
        }
        return redirect()->back()->withSuccess('Berhasil hapus data');

    }
}
