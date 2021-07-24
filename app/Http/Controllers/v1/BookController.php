<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

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
        $user_d = DB::table('booqers_d')->where("user_id",$req->user_id)->first();
        if ($user_d===null) {
	        $data = [
        		'error'=>4,
        		'msg'=>"Akun tidak ditemukan"
	        ];
        }else{
			if($user_d->address===null || $user_d->phone===null || $user_d->city_id===null || $user_d->province_id===null){
				$data = [
					'error'=>3,
					'msg'=>"Data akun belum lengkap"
				];
			}else{
				try {
					$arr = request()->validate([
						'book_name'=>'required',
						'user_id'=>'required',
						'description'=>'required',
						'address'=>'required',
						'category_id'=>'required',
						'thumbnail'=>'required|mimes:jpg,png,jpeg',
						'author'=>'required',
						'year'=>'required',
						'publisher'=>'required',
						'city_id'=>'required',
						'province_id'=>'required'
					]);
					$arr['thumbnail'] = $req->file('thumbnail')->getClientOriginalName();
					DB::table('books')->insert($arr);
					$req->file('thumbnail')->storeAs('user/'.$req->user_id.'/books',$req->file('thumbnail')->getClientOriginalName());
					$data = [
						'error'=>0,
						'msg'=>"Sukses menambah buku"
					];
				} catch (Exception $e) {
					$data = [
						'msg'=>$e->getMessage()
					];
				}
	        }
        }
        return response()->json($data);
	}
	function allBook(Request $req){
		$city = DB::select('SELECT * FROM (SELECT id,(((acos(sin(( '.$req->lat.' * pi() / 180))*sin(( `latitude` * pi() / 180)) + cos(( '.$req->lat.' * pi() /180 ))*cos(( `latitude` * pi() / 180)) * cos((( '.$req->lng.' - `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM city ) markers WHERE distance <= '.(is_null($req->dst)?'50':$req->dst).' LIMIT '.(is_null($req->jml)?'3':$req->jml).'');
		$arr = [];
		foreach ($city as $data => $value) {
			array_push($arr,$value->id);
		}
		$data = DB::table('books')
					->select('books.id','books.user_id','books.book_name','user.full_name','books.description','books.address','category.category_name','books.status','books.thumbnail','books.author','books.year','books.publisher')
					->join('booqers_d as user','user.user_id','=','books.user_id')
					->join('category','category.id','=','books.category_id')
					->where('books.city_id',$arr)
					->get();
		return [
			'error'=>0,
			'msg'=> 'All data',
			'data'=>$data
		];
	}
	function allofBook(){
		$data = DB::table('books')
					->select('books.id','books.user_id','books.book_name','user.full_name','books.description','books.address','category.category_name','books.status','books.thumbnail','books.author','books.year','books.publisher')
					->join('booqers_d as user','user.user_id','=','books.user_id')
					->join('category','category.id','=','books.category_id')
					->get();
		return [
			'error'=>0,
			'msg'=> 'All data',
			'data'=>$data
		];
	}
	function myBook($id){
		$data = DB::table('books')
					->select('books.id','books.user_id','books.book_name','user.full_name','books.description','books.address','category.category_name','books.status','books.thumbnail','books.author','books.year','books.publisher')
					->join('booqers_d as user','user.user_id','=','books.user_id')
					->join('category','category.id','=','books.category_id')
					->where('books.user_id',$id)
					->get();
		return [
			'error'=>0,
			'msg'=> 'All data',
			'data'=>$data
		];
	}
	function likeBook(Request $req){
		$city = DB::select('SELECT * FROM (SELECT id,(((acos(sin(( '.$req->lat.' * pi() / 180))*sin(( `latitude` * pi() / 180)) + cos(( '.$req->lat.' * pi() /180 ))*cos(( `latitude` * pi() / 180)) * cos((( '.$req->lng.' - `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM city ) markers WHERE distance <= '.(is_null($req->dst)?'50':$req->dst).' LIMIT '.(is_null($req->jml)?'3':$req->jml).'');
		$arr = [];
		foreach ($city as $data => $value) {
			array_push($arr,$value->id);
		}
		$data = DB::table('books')
					->select('books.id','books.book_name','user.full_name','books.description','books.address','category.category_name','books.status','books.thumbnail','books.author','books.year','books.publisher')
					->join('booqers_d as user','user.user_id','=','books.user_id')
					->join('category','category.id','=','books.category_id')
					->where([
								['books.book_name','LIKE','%'.$req->book_name.'%'],
								['books.city_id',$arr]
							])
					->get();
		return [
			'error'=>0,
			'msg'=> 'All data',
			'data'=>$data
		];
	}
	function detailBook(Request $req){
		$data = DB::table('books')
					->select('books.id','books.user_id','books.book_name','user.full_name','books.description','books.address','category.category_name','books.status','books.thumbnail','books.author','books.year','books.publisher')
					->join('booqers_d as user','user.user_id','=','books.user_id')
					->join('category','category.id','=','books.category_id')
					->where('books.id',$req->id)
					->first();
		return [
			'error'=>0,
			'msg'=> 'All data',
			'data'=>$data
		];
	}
	function updateBook(Request $req,$id){
		$req->setMethod('PUT');
	    	if ($req->file('thumbnail') === NULL) {
	        	$arr = request()->validate([
	        		'book_name'=>'required',
	        		'description'=>'required',
	        		'address'=>'required',
	        		'category_id'=>'required',
	        		'status'=>'required',
	        		'author'=>'required',
	        		'year'=>'required',
	        		'publisher'=>'required',
	        		'city_id'=>'required',
	        		'province_id'=>'required'
	        	]);
	    	}else{
	        	$arr = request()->validate([
	        		'book_name'=>'required',
	        		'description'=>'required',
	        		'address'=>'required',
	        		'category_id'=>'required',
	        		'status'=>'required',
	        		'thumbnail'=>'required|mimes:jpg,png,jpeg',
	        		'author'=>'required',
	        		'year'=>'required',
	        		'publisher'=>'required',
	        		'city_id'=>'required',
	        		'province_id'=>'required'
	        	]);
				$arr['thumbnail'] = $req->file('thumbnail')->getClientOriginalName();
	        	$req->file('thumbnail')->storeAs('user/'.$req->id.'/books',$req->file('thumbnail')->getClientOriginalName());
	    	}
	    	try {
				BookModel::where('id',$id)->update($arr);
				$data = [
					'error'=>0,
					'msg'=>"Sukses update buku"
				];
	    	} catch (Exception $e) {
				$data = [
					'error'=>1,
					'msg'=>$e->getMessage()
				];
	    	}
        	return $data;
	}
	function updateBookStatus(Request $req,$id){
		$req->setMethod('PUT');
			$arr = request()->validate([
				'status'=>'required'
			]);
	    	try {
				BookModel::where('id',$id)->update($arr);
				$data = [
					'error'=>0,
					'msg'=>"Sukses update status buku"
				];
	    	} catch (Exception $e) {
				$data = [
					'error'=>1,
					'msg'=>$e->getMessage()
				];
	    	}
        	return $data;
	}
	function deleteBook($id){
	    	try {
				BookModel::where('id',$id)->delete();
				$data = [
					'error'=>0,
					'msg'=>"Sukses hapus buku"
				];
	    	} catch (Exception $e) {
				$data = [
					'error'=>1,
					'msg'=>$e->getMessage()
				];
	    	}
        	return $data;
	}
}
