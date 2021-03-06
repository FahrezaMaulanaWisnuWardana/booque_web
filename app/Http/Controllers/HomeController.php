<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){
        $data = [
            'jml_buku'=>DB::table('books')->count(),
            'jml_user'=>DB::table('booqers_d')->count(),
            'buku_terbagikan'=>DB::table('books')->where('status',2)->count()
        ];
    	return view('home',$data);
    }
    function blog(){
        $data = [
            'blog' => DB::table('blog')
                        ->select('*','blog.created_at as tgl_buat')
                        ->join('blog_category','blog_category.id','=','blog.category_id')
                        ->get()
        ];
        return view('blog',$data);
    }
    function cari(Request $req){
        $data = [
            'blog' => DB::table('blog')
                        ->select('*','blog.created_at as tgl_buat')
                        ->join('blog_category','blog_category.id','=','blog.category_id')
                        ->where('article_name','LIKE',"%".$req->cari."%")
                        ->get()
        ];
        return view('blog',$data);
    }
    function detailBlog($type , $slug){
        $data = [
            'blog' => DB::table('blog')->select('*','blog.created_at as tgl_buat')->join('blog_category','blog_category.id','=','blog.category_id')->where(['blog_category.category_name'=> $type ,'blog.slug'=>$slug])->first(),
            'someblog' => DB::table('blog')->select('*','blog.created_at as tgl_buat')->join('blog_category','blog_category.id','=','blog.category_id')->limit(4)->get()
        ];
        return view('d-blog',$data);
    }
    function mailTemplate(){
        return view('emails.test');
    }
}
