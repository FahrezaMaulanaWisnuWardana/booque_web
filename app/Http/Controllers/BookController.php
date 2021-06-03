<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\BookModel;
use App\Models\Booqers_d;
use App\Models\CategoryModel;
use App\Models\City;

class BookController extends Controller
{
	function addBook(Request $req){
        $user_d = DB::table('booqers_d')->where("user_id",$req->id)->first();
        if ($user_d===null) {
	        $data = [
        		'error'=>4,
        		'msg'=>"Akun tidak ditemukan"
	        ];
        }
        if($user_d->address===null || $user_d->phone===null || $user_d->city_id===null || $user_d->province_id===null){
        	$data = [
        		'error'=>3,
        		'msg'=>"Data akun belum lengkap"
        	];
        }else{
        	$arr = [
        		'book_name'=>$req->book_name,
        		'user_id'=>$req->id,
        		'description'=>$req->description,
        		'address'=>$req->address,
        		'category_id'=>$req->category_id,
        		'status'=>1,
        		'thumbnail'=>$req->thumbnail,
        		'author'=>$req->author,
        		'year'=>$req->year,
        		'publisher'=>$req->publisher,
        		'city_id'=>$req->city_id,
        		'province_id'=>$req->province_id,
        		'created_at' =>  date('Y-m-d H:i:s')
        	];
        	DB::table('books')->insert($arr);
        	$validator = Validator::make($req->all(), [
        		'book_name'=>'required',
        		'user_id'=>'required',
        		'description'=>'required',
        		'address'=>'required',
        		'category_id'=>'required',
        		'thumbnail'=>'required',
        		'author'=>'required',
        		'year'=>'required',
        		'publisher'=>'required',
        		'city_id'=>'required',
        		'province_id'=>'required'
        	]);
		    if ($validator->fails()) {
		        $data = [
	        		'error'=>3,
	        		'msg'=>$validator->messages()
		        ];
		    }
	        $data = [
        		'error'=>0,
        		'msg'=>"Sukses menambah buku"
	        ];
        }
        return $data;
	}
	function listBook(Request $req){
		if (is_null($req->book_name)) {
			$res = DB::table('books')
			->select('books.id','books.book_name','books.description','books.address','books.status','books.thumbnail','books.author','books.year','books.publisher','category.category_name','c.city_name as kota_buku','p.province_name as provinsi_buku','booqers_d.full_name','booqers_d.phone','booqers_d.address','booqers_d.phone','city.city_name','province.province_name')
			->join('category','category.id','=','books.category_id')
			->join('booqers_d','booqers_d.user_id','=','books.user_id')
			->join('city','city.id','=','booqers_d.city_id')
			->join('province','province.id','=','booqers_d.province_id')
			->join('city as c','c.id','=','books.city_id')
			->join('province as p','p.id','=','books.province_id')
			->get();
		}else{
			$res = DB::table('books')
			->select('books.book_name','books.description','books.address','books.status','books.thumbnail','books.author','books.year','books.publisher','category.category_name','c.city_name as kota_buku','p.province_name as provinsi_buku','booqers_d.full_name','booqers_d.phone','booqers_d.address','booqers_d.phone','city.city_name','province.province_name')
			->join('category','category.id','=','books.category_id')
			->join('booqers_d','booqers_d.user_id','=','books.user_id')
			->join('city','city.id','=','booqers_d.city_id')
			->join('province','province.id','=','booqers_d.province_id')
			->join('city as c','c.id','=','books.city_id')
			->join('province as p','p.id','=','books.province_id')->where("book_name","like","%".$req->book_name."%")->get();
		}
		return ["result"=>$res];
	}
	function nearestBook(Request $req){
		$res = DB::table('books')
		->select('books.book_name','books.description','books.address','books.status','books.thumbnail','books.author','books.year','books.publisher','category.category_name','c.city_name as kota_buku','p.province_name as provinsi_buku','booqers_d.full_name','booqers_d.phone','booqers_d.address','booqers_d.phone','city.city_name','province.province_name')
		->join('category','category.id','=','books.category_id')
		->join('booqers_d','booqers_d.user_id','=','books.user_id')
		->join('city','city.id','=','booqers_d.city_id')
		->join('province','province.id','=','booqers_d.province_id')
		->join('city as c','c.id','=','books.city_id')
		->join('province as p','p.id','=','books.province_id')
		->where("c.city_name","like","%".$req->city_name."%")->get();
		return ["result"=>$res];
	}
}
