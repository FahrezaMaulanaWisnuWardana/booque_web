<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\BlogCategoryModel;

class BlogCategoryController extends Controller
{
    function blogCategory(){
        $data = [
            'category'=> DB::table('blog_category')->select('*')->get()
        ];
        return view('dashboard.main.blog_category.category',$data);
    }
    function createCategoryBlog(){
        return view('dashboard.main.blog_category.createBlogCategory');
    }
    function addCategoryBlog(Request $req){
        request()->validate($rules = ['category'=> 'required'],['category.required'=>'Nama kategori tidak boleh kosong']);
        $validator = Validator::make($req->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        DB::table('blog_category')->insert(['category_name'=>$req->category]);
        return redirect('dashboard/blog-category')->withSuccess('Berhasil tambah kategori');
    }
    function deleteCategoryBlog($id){
        $blog = BlogCategoryModel::find($id);
        $delete = $blog->delete();
        if (!$delete) {
            return redirect('dashboard/blog-category')->withErrors('Gagal hapus kategori');
        }
        return redirect('dashboard/blog-category')->withSuccess('Berhasil hapus kategori');
    }
    function editCategoryBlog($id){
        $data=[
            'category' => BlogCategoryModel::where('id',$id)->first()
        ];
        return view('dashboard.main.blog_category.editBlogCategory',$data);
    }
    function updateCategoryBlog(Request $req , $id){
        request()->validate($rules = ['category'=> 'required'],['category.required'=>'Nama kategori tidak boleh kosong']);
        $validator = Validator::make($req->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        BlogCategoryModel::where('id',$id)->update(['category_name'=>$req->category]);
        return redirect('dashboard/blog-category')->withSuccess('Berhasil Update kategori');
    }
}
