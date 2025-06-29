<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $data['products'] = Product::where('status',1)->get();
        return view("welcome",$data);
    }
}
