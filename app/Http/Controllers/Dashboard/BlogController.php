<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\BlogModel;

class BlogController extends Controller
{
    function blog(){
        $data = [
            'blog'=> DB::table('blog')->select('blog.*' , 'blog_category.*' , 'blog.id as blog_id')->join('blog_category','blog_category.id','=','blog.category_id')->get()
        ];
        return view('dashboard.main.blog.blog',$data);
    }
    function createBlog(){
        $data = [
            'category'=> DB::table('blog_category')->select('*')->get()
        ];
        return view('dashboard.main.blog.createBlog',$data);
    }
    function addBlog(Request $req){
        request()->validate($rules = [
            "title"=>"required",
            "thumbnail"=>"required",
            "content"=>"required",
            "category"=>"required"
        ],[
            "title.required"=>"Judul/Title tidak boleh kosong",
            "thumbnail.required"=>"Thumbnail tidak boleh kosong",
            "content.required"=>"Konten tidak boleh kosong",
            "category.required"=>"Kategory tidak boleh kosong"  
        ]);
        $validator = Validator::make($req->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        // Slug
        $slugEx = explode(' ', $req->title);
        $slugIm = implode('-', $slugEx);

        // Save Image Summernote
        $storages = "storage/blog";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($req->content,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $img = $dom->getElementsByTagName('img');
        foreach ($img as $dataImg) {
            $src = $dataImg->getAttribute('src');
            if (preg_match('/data:image/',$src)) {
                preg_match('/data:image\/(?<mime>.*?)\:/',$src);
                $image_info = getimagesize($src);
                $extension = (isset($image_info["mime"]) ? explode('/', $image_info["mime"] )[1]: "");
                $fileNameContent=uniqid();
                $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
                $filePath=("$storages/$fileNameContentRand.$extension");
                if (!file_exists($storages)) {
                    mkdir($storages,0777,true);
                }
                $img = Image::make($src)->save(public_path($filePath));
                $new_src = asset($filePath);
                $dataImg->removeAttribute('src');
                $dataImg->setAttribute('src',$new_src);
                $dataImg->setAttribute('class','img-responsive');
            }
        }
        // Check Image Thumbnail
        $type = $req->file('thumbnail')->getMimeType();
        if ($type === "image/jpeg" || $type === "image/jpg" || $type === "image/png") {
            $req->file('thumbnail')->storeAs('blog/thumbnail',$req->file('thumbnail')->getClientOriginalName());
            $arr = [
                'article_name'=>$req->title,
                'thumbnail'=>$req->file('thumbnail')->getClientOriginalName(),
                'slug'=>$slugIm,
                'article'=>$dom->saveHTML(),
                'category_id'=>$req->category,
                'created_at'=>date('Y-m-d')
            ];
            BlogModel::insert($arr);
            return redirect('dashboard/blog')->withSuccess('Berhasil Tambah Artikel');
        }else{
            return redirect()->back()->withErrors('Thumbnail Tidak Valid');
        }
    }
    function editBlog($id){
        $data = [
            'category'=> DB::table('blog_category')->select('*')->get(),
            'blog'=>BlogModel::where('id',$id)->first()
        ];
        return view('dashboard.main.blog.updateBlog',$data);
    }
    function updateBlog(Request $req , $id){
        request()->validate($rules = [
            "title"=>"required",
            "content"=>"required",
            "category"=>"required"
        ],
        [
            "title.required"=>"Judul/Title tidak boleh kosong",
            "thumbnail.required"=>"Thumbnail tidak boleh kosong",
            "content.required"=>"Konten tidak boleh kosong",
            "category.required"=>"Kategory tidak boleh kosong"  
        ]);
        $validator = Validator::make($req->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        // Slug
        $slugEx = explode(' ', $req->title);
        $slugIm = implode('-', $slugEx);

        // Save Image Summernote
        $storages = "storage/blog";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($req->content,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $img = $dom->getElementsByTagName('img');
        foreach ($img as $dataImg) {
            $src = $dataImg->getAttribute('src');
            if (preg_match('/data:image/',$src)) {
                preg_match('/data:image\/(?<mime>.*?)\:/',$src);
                $image_info = getimagesize($src);
                $extension = (isset($image_info["mime"]) ? explode('/', $image_info["mime"] )[1]: "");
                $fileNameContent=uniqid();
                $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
                $filePath=("$storages/$fileNameContentRand.$extension");
                if (!file_exists($storages)) {
                    mkdir($storages,0777,true);
                }
                $img = Image::make($src)->save(public_path($filePath));
                $new_src = asset($filePath);
                $dataImg->removeAttribute('src');
                $dataImg->setAttribute('src',$new_src);
                $dataImg->setAttribute('class','img-responsive');
            }
        }
        // Check Image Thumbnail
        if ($req->file('thumbnail')===NULL) {
            $arr = [
                'article_name'=>$req->title,
                'slug'=>$slugIm,
                'article'=>$dom->saveHTML(),
                'category_id'=>$req->category
            ];
            BlogModel::where('id',$id)->update($arr);
            return redirect('dashboard/blog')->withSuccess('Berhasil Update Artikel');
        }
        $type = $req->file('thumbnail')->getMimeType();
        if ($type === "image/jpeg" || $type === "image/jpg" || $type === "image/png") {
            $req->file('thumbnail')->storeAs('blog/thumbnail',$req->file('thumbnail')->getClientOriginalName());
            $arr = [
                'article_name'=>$req->title,
                'thumbnail'=>$req->file('thumbnail')->getClientOriginalName(),
                'slug'=>$slugIm,
                'article'=>$dom->saveHTML(),
                'category_id'=>$req->category
            ];
            BlogModel::where('id',$id)->update($arr);
            return redirect('dashboard/blog')->withSuccess('Berhasil Update Artikel');
        }else{
            return redirect()->back()->withErrors('Thumbnail Tidak Valid');
        }
    }
    function deleteBlog($id){
        $blog = BlogModel::find($id);
        $delete = $blog->delete();
        if (!$delete) {
            return redirect('dashboard/blog')->withErrors('Gagal Hapus Artikel');
        }
        return redirect('dashboard/blog')->withSuccess('Berhasil Hapus Artikel');
    }
}
