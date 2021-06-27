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
	function allBook(){
		return [
			'error'=>0,
			'msg'=> 'All data',
			'data'=>BookModel::all()
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
	function nearestLocation(Request $req){
		$city = DB::select('SELECT * FROM (SELECT id, city_name ,latitude , longitude ,(((acos(sin(( '.$req->lat.' * pi() / 180))*sin(( `latitude` * pi() / 180)) + cos(( '.$req->lat.' * pi() /180 ))*cos(( `latitude` * pi() / 180)) * cos((( '.$req->lng.' - `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM city ) markers WHERE distance <= '.(is_null($req->dst)?'50':$req->dst).' LIMIT '.(is_null($req->jml)?'3':$req->jml).'');
		return ["result"=>$city];
	}
}
