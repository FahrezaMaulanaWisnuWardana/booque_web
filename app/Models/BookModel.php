<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;
    protected $table = 'books';
    public function booqers(){
    	return $this->belongsTo(Booqers_d::class,'user_id','id');
    }
    public function category(){
    	return $this->belongsTo(CategoryModel::class,'category_id','id');
    }
}
