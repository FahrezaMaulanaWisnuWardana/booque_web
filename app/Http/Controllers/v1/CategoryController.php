<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CategoryModel;

class CategoryController extends Controller
{
    function index($book=null , $id=null, $lat=null , $lng=null , $dst=null , $jml=null){
        $data = CategoryModel::all();
        if(is_null($book) && is_null($id) && is_null($lat) && is_null($lng) && is_null($dst) && is_null($jml)){
            $data = ['err'=>1,'msg'=>'Param Need'];
        }else{
            $city = DB::select('SELECT * FROM (SELECT id,(((acos(sin(( '.$lat.' * pi() / 180))*sin(( `latitude` * pi() / 180)) + cos(( '.$lat.' * pi() /180 ))*cos(( `latitude` * pi() / 180)) * cos((( '.$lng.' - `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM city ) markers WHERE distance <= '.(is_null($dst)?'50':$dst).' LIMIT '.(is_null($jml)?'3':$jml).'');
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
    function category(){
        $data = CategoryModel::all();
        return $data;
    }
}
