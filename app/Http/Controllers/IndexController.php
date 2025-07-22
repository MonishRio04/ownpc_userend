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
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Barryvdh\DomPDF\Facade\Pdf;


class IndexController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $data['products'] = Product::where('status', 1)->get();
        $data['categories'] = Category::where('status', 1)->limit(5)->get();
        $data['sliders'] = Slider::latest()->get();
        $data['wishlistedProductIds'] = $userId
            ? \App\Models\Wishlist::where('user_id', $userId)->pluck('product_id')->toArray()
            : [];
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
         $userId = auth()->id();
        $category = Category::with('products')->findOrFail($id);
         $wishlistedProductIds = $userId
            ? \App\Models\Wishlist::where('user_id', $userId)->pluck('product_id')->toArray()
            : [];
        return view('frontend.category', compact('category','wishlistedProductIds'));
    }

    public function SubCategoryProduct($id)
    {
        $userId = auth()->id();
        $subcategory = SubCategory::with('products')->findOrFail($id);
        $wishlistedProductIds = $userId
            ? \App\Models\Wishlist::where('user_id', $userId)->pluck('product_id')->toArray()
            : [];
        return view('frontend.subcategory', compact('subcategory', 'wishlistedProductIds'));
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
        return view('frontend.checkout', compact('cart'));
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
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to place an order.');
        }

        $request->validate([
            'phone'   => 'required',
            'address' => 'required',
        ]);

        $order_id = Order::insertGetId([
            'user_id'        => Auth::id(),
            'division_id'    => 1,
            'district_id'    => 1,
            'state_id'       => 1,
            'name'           => Auth::user()->name,
            'email'          => Auth::user()->email,
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
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Please log in to continue.');
        }

        $validated = $request->validate([
            'name'          => 'required|string',
            'phone'         => 'required|string',
            'landmark'      => 'required|string',
            'city'          => 'required|string',
            'address_type'  => 'required|in:home,office',
        ]);
        $user = auth()->user();
       $fullAddress = $validated['landmark'] . ', ' . $validated['city'];
        $notes = 'Type: ' . $validated['address_type'];
 $user->address = $fullAddress;
    
    $user->save();
        return view('frontend.payment', compact('validated', 'fullAddress', 'notes'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|digits:10',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->back()->with('success', 'Registered successfully');
    }


    // Login
    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:10',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('phone', 'password'))) {
            return redirect()->back()->with('success',  'Login successful');
        }

        return redirect()->back()->with('error', 'Invalid phone or password');
    }



    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully');
    }


    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }
    public function updateField(Request $request, $field)
    {
        $allowedFields = ['name', 'email', 'phone','address'];

        if (!in_array($field, $allowedFields)) {
            abort(403, 'Invalid field update request.');
        }

        $rules = [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->id()],
            'phone' => ['required', 'digits:10', 'unique:users,phone,' . auth()->id()],
            'address' => ['nullable', 'string', 'max:255'],
        ];

        $request->validate([
            'value' => $rules[$field]
        ]);

        auth()->user()->update([
            $field => $request->input('value'),
        ]);

        return redirect()->back()->with('success', ucfirst($field) . ' updated successfully.');
   }
    public function showOrders($id)
    {
        $user = User::findOrFail($id);
        $orders = $user->orders()->with('items.product')->get();

        return view('user.orders', compact('user', 'orders'));
    }
    public function detailedShow($id)
    {
        $order = Order::with(['items.product', 'user'])->where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('user.orderdetails', compact('order'));
    }

    public function downloadInvoice($id)
    {
        $order = Order::with(['items.product', 'user'])->where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $pdf = Pdf::loadView('user.ordersInvoice', compact('order'));
        return $pdf->download('invoice_' . $order->id . '.pdf');
    }

    public function toggle(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->input('product_id');

        $existing = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId
            ]);
            return response()->json(['status' => 'added']);
        }
    }
    public function showWishlist()
{
     if (!Auth::check()) {
            return redirect()->back()->with('error', 'Please log in to continue.');
        }
    $wishlistProducts = Product::whereIn('id', Wishlist::where('user_id', Auth::id())->pluck('product_id'))->get();

    return view('user.wishlist', compact('wishlistProducts'));
}

   public function addCart(Request $request)
{
    $product = Product::findOrFail($request->product_id); 
    $price = $product->discount_price ?? $product->selling_price;

    Cart::add([
        'id' => $product->id,
        'name' => $product->product_name,
        'qty' => 1,
        'price' => $price,
        'weight' => 1,
        'options' => [
            'image' => $product->product_thambnail,
        ],
    ]);

    return response()->json(['status' => 'success']);
}

public function refreshCart()
{
    $cart = Cart::content();
    $total = Cart::total();

    return view('layout.cart_html', compact('cart', 'total'))->render();
}
public function sortOrderChange(Request $request){
  
   $categoryId=$request->category_id;
   $sortorder=$request->sort;
   category::findOrFail($categoryId)->update(['sort_order'=>$sortorder]);
    return redirect()->back(); 
}
}
