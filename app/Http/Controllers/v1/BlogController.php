<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    function index(){
        $data = [
            'error'=>0,
            'data'=> DB::table('blog')
                                ->select('blog.*' , 'blog_category.*' , 'blog.id as blog_id')
                                ->join('blog_category','blog_category.id','=','blog.category_id')->get()
        ];
        return $data;
    }
}
