<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Str; // ✅ CORRECT


class IndexController extends Controller
{
    public function index()
    {
        $data['products'] = Product::where('status', 1)->get();
        $data['categories'] = Category::where('status', 1)->limit(5)->get();
        $data['sliders'] = Slider::latest()->get();

        return view("frontend.welcome", $data);
    }

    
    public function CategoryWiseProduct($id, $slug)
    {
        $data['products'] = Product::where('category_id', $id)->where('status', 1)->get();
        $data['category'] = Category::findOrFail($id);
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

   
    public function ShowProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.showProduct', compact('product'));
    }

  
    public function Contactus()
    {
        return view('frontend.contactus');
    }

    public function ajaxAddToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        
        $price = $product->discount_price ?? $product->selling_price;

       
        Cart::add([
            'id'      => $product->id,
            'name'    => $product->product_name,
            'qty'     => $request->quantity,
            'price'   => $price,
            'weight'  => 1, 
            'options' => [
                'image' => $product->product_thambnail
            ],
        ]);

        return response()->json([
            'status'     => 'success',
            'message'    => 'Product added to cart!',
            'cart_count' => Cart::count(),
            'total'      => Cart::total()
        ]);
    }

   
    public function Checkout(Request $request)
    {
        $cart = Cart::content();

        if ($request->ajax()) {
            return view('layout.checkout', compact('cart')); 
        }

    }

   
    public function removeCart(Request $request)
{
    $rowId = $request->rowId;

    if ($rowId) {
        Cart::remove($rowId);

        return response()->json([
            'status' => 'success',
            'message' => 'Item removed!',
            'total' => Cart::total()
        ]);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'Item not found!'
    ]);
}


public function placeOrder(Request $request)
{
    $request->validate([
        'name'    => 'required',
        'email'   => 'required|email',
        'phone'   => 'required',
        'address' => 'required',
    ]);

 
    $order_id = Order::insertGetId([
        'user_id'        => Auth::check() ? Auth::id() : null, 
        'division_id'    => 1,
        'district_id'    => 1,
        'state_id'       => 1,
        'name'           => $request->name,
        'email'          => $request->email,
        'phone'          => $request->phone,
        'address'        => $request->address,
        'post_code'      => $request->post_code ?? '',
        'notes'          => $request->notes ?? '',
        'payment_type'   => $request->payment_method == 'Card' ? 'Online' : 'Cash On Delivery',
        'payment_method' => $request->payment_method ?? 'COD',
        'transaction_id' => null,
        'currency'       => 'INR',
        'amount'         => floatval(Cart::total()), 
        'order_number'   => 'ORD-' . strtoupper(Str::random(8)),
        'invoice_no'     => 'INV' . mt_rand(10000000, 99999999),
        'order_date'     => Carbon::now()->format('Y-m-d'),
        'order_month'    => Carbon::now()->format('F'),
        'order_year'     => Carbon::now()->format('Y'),
        'status'         => 'pending',
        'created_at'     => Carbon::now(),
    ]);

    
    foreach (Cart::content() as $item) {
        OrderItem::insert([
            'order_id'   => $order_id,
            'product_id' => $item->id,
            'vendor_id'  => 1,
            'color'      => $item->options->color ?? null,
            'size'       => $item->options->size ?? null,
            'qty'        => $item->qty,
            'price'      => $item->price,
            'created_at' => Carbon::now(),
        ]);
    }

   
    Cart::destroy();

    return redirect('/')->with('success', 'Your order has been placed successfully!');
}
public function showPaymentPage(Request $request)
{
    $validated = $request->validate([
        'name'          => 'required|string',
        'phone'         => 'required|string',
        'landmark'      => 'required|string',
        'city'          => 'required|string',
        'address_type'  => 'required|in:home,office',
    ]);

    return view('frontend.payment', compact('validated'));
}
}

