<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CategoryModel;

class CategoryController extends Controller
{
    function index(Request $req, $book=null , $id=null){
        $data = CategoryModel::all();
        if(!is_null($book) && is_null($id)){
            $data = ['err'=>1,'msg'=>'One parameter detected two parameter expected'];
        }else{
            $arr = request()->validate([
                'lat'=>'required',
                'lng'=>'required'
            ]);
            $city = DB::select('SELECT * FROM (SELECT id,(((acos(sin(( '.$req->lat.' * pi() / 180))*sin(( `latitude` * pi() / 180)) + cos(( '.$req->lat.' * pi() /180 ))*cos(( `latitude` * pi() / 180)) * cos((( '.$req->lng.' - `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM city ) markers WHERE distance <= '.(is_null($req->dst)?'50':$req->dst).' LIMIT '.(is_null($req->jml)?'3':$req->jml).'');
            $arr = [];
            foreach ($city as $data => $value) {
                array_push($arr,$value->id);
            }
            $data = DB::table('category')
                        ->select('category.id','category.category_name','b.id as b_id','b.book_name','b.thumbnail','b.publisher','b.year','b.author')
                        ->join('books as b','b.category_id','=','category.id')
                        ->where([
                                    ['b.category_id',$id],
                                    ['b.city_id',$arr],
                                ])->get();
        }
        return $data;
    }
}
