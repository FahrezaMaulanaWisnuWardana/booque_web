<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\BookModel;
use App\Models\Booqers_d;
use App\Models\City;
use App\Models\ProvinceModel;
use App\Models\CategoryModel;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'book'=> DB::table('books')->select('books.id','books.book_name','books.status','books.year','books.publisher','category.category_name')
            ->join('category','category.id','=','books.category_id')
            ->get()
        ];
        // dd($data['book']['0']);
        return view('dashboard.main.book.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['book']= DB::table('books')
                        ->select('books.id','books.user_id','books.book_name','books.description','books.address','books.status','books.thumbnail','books.author','books.year','books.publisher','category.category_name','c.city_name as kota_buku','p.province_name as provinsi_buku')
                        ->join('category','category.id','=','books.category_id')
                        ->join('city as c','c.id','=','books.city_id')
                        ->join('province as p','p.id','=','books.province_id')
                        ->where("books.id",$id)->first();

        $data['user']=DB::table('booqers_d')->select('booqers_d.full_name','booqers_d.address','booqers_d.phone','booqers.email','booqers.is_active','city.city_name','province.province_name')
                        ->join('booqers','booqers.id','=','booqers_d.user_id')
                        ->join('city','city.id','=','booqers_d.city_id')
                        ->join('province','province.id','=','booqers_d.province_id')
                        ->where('booqers_d.user_id',$data['book']->user_id)->first();
        return view('dashboard.main.book.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'book'=>BookModel::where('id',$id)->first(),
            'user'=>Booqers_d::all(),
            'city'=>City::all(),
            'province'=>ProvinceModel::all(),
            'category'=>CategoryModel::all(),
        ];
        return view('dashboard.main.book.update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->image !== null) {
            try {
                request()->validate([
                    "book_name"=>"required",
                    "user"=>"required",
                    "description"=>"required",
                    "address"=>"required",
                    "category"=>"required",
                    "image"=>"required|mimes:jpg,png,jpeg",
                    "author"=>"required",
                    "year"=>"required",
                    "publisher"=>"required",
                    "province"=>"required",
                    "city"=>"required"
                ]);
                $request->file('image')->storeAs('user/'.$request->user.'/books',$request->file('image')->getClientOriginalName());
                $arr = [
                    'book_name'=>$request->book_name,
                    'user_id'=>$request->user,
                    'description'=>$request->description,
                    'address'=>$request->address,
                    'category_id'=>$request->category,
                    'thumbnail'=>$request->file('image')->getClientOriginalName(),
                    'author'=>$request->author,
                    'year'=>$request->year,
                    'publisher'=>$request->publisher,
                    'city_id'=>$request->city,
                    'province_id'=>$request->province,
                ];
                BookModel::where('id',$id)->update($arr);
                return redirect()->route('book.index')->withSuccess('Berhasil Update Buku');
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
        }else{
            try {
                request()->validate([
                    "book_name"=>"required",
                    "user"=>"required",
                    "description"=>"required",
                    "address"=>"required",
                    "category"=>"required",
                    "author"=>"required",
                    "year"=>"required",
                    "publisher"=>"required",
                    "province"=>"required",
                    "city"=>"required"
                ]);
                $arr = [
                    'book_name'=>$request->book_name,
                    'user_id'=>$request->user,
                    'description'=>$request->description,
                    'address'=>$request->address,
                    'category_id'=>$request->category,
                    'author'=>$request->author,
                    'year'=>$request->year,
                    'publisher'=>$request->publisher,
                    'city_id'=>$request->city,
                    'province_id'=>$request->province,
                ];
                BookModel::where('id',$id)->update($arr);
                return redirect()->route('book.index')->withSuccess('Berhasil Update Buku');
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = BookModel::where('id',$id)->delete();
        if(!$delete){
            return redirect()->back()->withErrors('Gagal hapus data');
        }
        return redirect()->route('book.index')->withSuccess('Berhasil hapus data');
    }
}
