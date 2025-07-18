<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function show($id)
{
    
    $product = \App\Models\Product::findOrFail($id);
    return view('products.show', compact('product'));
    
}

}
