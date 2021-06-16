<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){
    	return view('home');
    }
    function blog(){
        $data = [
            'blog' => DB::table('blog')->select('*','blog.created_at as tgl_buat')->join('blog_category','blog_category.id','=','blog.category_id')->get()
        ];
        return view('blog',$data);
    }
    function detailBlog($type , $slug){
        $data = [
            'blog' => DB::table('blog')->select('*','blog.created_at as tgl_buat')->join('blog_category','blog_category.id','=','blog.category_id')->where(['blog_category.category_name'=> $type ,'blog.slug'=>$slug])->first()
        ];
        return view('d-blog',$data);
    }
    function mailTemplate(){
        return view('emails.test');
    }
}
