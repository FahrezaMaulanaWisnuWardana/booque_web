<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TransactionModel;
use App\Models\BookModel;

class TransactionController extends Controller
{
    function store(Request $req){
        try {
            $arr = request()->validate([
                'user_id'=>'required|numeric',
                'book_id'=>'required|numeric',
                'thumbnail'=>'required|mimes:jpg,png,jpeg',
                'buyer_id'=>'nullable|numeric'
            ]);
            $arr['thumbnail'] = $req->file('thumbnail')->getClientOriginalName();
            $ins = DB::table('book_transaction')->insert($arr);
            $req->file('thumbnail')->storeAs('user/'.$req->user_id.'/books',$req->file('thumbnail')->getClientOriginalName());
        } catch (Exception $e) {
            $data = [
                'error'=>1,
                'msg'=>$e->getMessage()
            ];
        }
        if($ins){
            try {
                BookModel::where('id',$req->book_id)->update(['status'=>2]);
                $data = [
                    'error'=>0,
                    'msg'=>'Transaksi Berhasil'
                ];
            } catch (Exception $e) {
                $data = [
                    'error'=>1,
                    'msg'=>$e->getMessage()
                ];
            }
        }
        return $data;
    }
    function index($id){
        try {
            $sql = DB::table('book_transaction')
                     ->select('b.updated_at as transaction_date','b.book_name','u.full_name','buy.full_name as buyer')
                     ->join('books as b','b.id','=','book_transaction.book_id')
                     ->join('booqers_d as u','u.user_id','=','book_transaction.user_id')
                     ->leftJoin('booqers_d as buy','buy.user_id','=','book_transaction.buyer_id')
                     ->where('book_transaction.user_id',$id)->get();
            $data = [
                'error'=>0,
                'msg'=>$sql
            ];
        } catch (Exception $e) {
            $data = [
                'error'=>1,
                'msg'=>$e->getMessage()
            ];
        }
        return $data;
    }
    function show($id,$trx){
        try {
            $sql = DB::table('book_transaction')
                     ->select('book_transaction.id as transaction_id','b.updated_at as transaction_date','b.id as book_id','b.book_name','b.thumbnail','u.full_name','buy.full_name as buyer','book_transaction.thumbnail as bukti')
                     ->join('books as b','b.id','=','book_transaction.book_id')
                     ->join('booqers_d as u','u.user_id','=','book_transaction.user_id')
                     ->leftJoin('booqers_d as buy','buy.user_id','=','book_transaction.buyer_id')
                     ->where([
                        ['book_transaction.user_id',$id],
                        ['book_transaction.id',$trx]
                        ])->get();
            $data = [
                'error'=>0,
                'msg'=>$sql
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
