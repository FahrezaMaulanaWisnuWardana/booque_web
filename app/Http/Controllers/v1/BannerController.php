<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BannerModel;

class BannerController extends Controller
{
    function index(){
        $data = [
            'error'=>0,
            'data'=>BannerModel::where('is_active',1)->get()
        ];
        return $data;
    }
}
