<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Models\Booqers_d;
use App\Models\CategoryModel;
use App\Models\City;

class BookController extends Controller
{
	function listBook(Request $req){
		if (is_null($req->book_name)) {
			$res = DB::table('books')
			->select('books.book_name','books.description','books.address','books.status','books.thumbnail','books.author','books.year','books.publisher','category.category_name','c.city_name as kota_buku','p.province_name as provinsi_buku','booqers_d.full_name','booqers_d.phone','booqers_d.address','booqers_d.phone','city.city_name','province.province_name')
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
			->join('province as p','p.id','=','books.province_id')
			->where("book_name","like","%".$req->book_name."%")->get();
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
