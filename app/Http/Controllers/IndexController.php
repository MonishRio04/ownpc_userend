<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(){
        $data['products'] = Product::where('status',1)->get();
        $data['categories'] = Category::where('status',1)->limit(5)->get();
        $data['sliders'] = Slider::latest()->get();
       
        return view("my.welcome",$data);
    }

public function CategoryWiseProduct($id, $slug){
        $data['products'] = Product::where('category_id', $id)->where('status', 1)->get();
        $data['category'] = Category::find($id);        
        return view("categorywise_product", $data);
}
public function CategoryProduct($id)
{
    
    $category = Category::with('products')->findOrFail($id);
    return view('frontend.category', compact('category'));
}

public function SubCategoryProduct($id)
{
    $subcategory = SubCategory::with('products')->findOrFail($id);
    return view('frontend.subcategory', compact('subcategory'));
}



public function ShowSingleProduct($id)
{
    $product = Product::findOrFail($id);
    return view('my.singleproduct1', compact('product'));
}





}
