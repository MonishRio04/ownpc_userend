<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipCities;
use App\Models\ShipDistricts;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => round($product->selling_price * (1 + ($product->gst_percent / 100)), 2),
                'weight' => $product?->weight ?? 1,

                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => round($product->discount_price * (1 + ($product->gst_percent / 100)), 2),
                'weight' => $product?->weight ?? 1,
                'gst' => $product->gst_percent,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal
        ));
    }

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Removed From Cart']);
    }

    public function MyCart()
    {
        return view('frontend.mycart.view_mycart');
    }

    public function AddToCartDetails(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => round($product->selling_price * (1 + ($product->gst_percent / 100)), 2),
                'weight' => $product?->weight ?? 1,
                'gst' => $product->gst_percent,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,

                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => round($product->discount_price * (1 + ($product->gst_percent / 100)), 2),
                'weight' => $product?->weight ?? 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,

                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal
        ));
    }

    public function GetCartProductWithWeigthNGST()
    {
        $carts = Cart::content();
        $cartQty = $carts->count();
        $cartTotal = 0;
        $cartDetails = [];
        $totalWeight = 0;

        foreach ($carts as $cart) {
            // Assuming product_id is a column in the Cart model representing the product ID
            $productId = $cart->id;
            $productRowId = $cart->rowId;

            // Query the product from the Product table
            $product = Product::find($productId);

            if ($product) {
                if ($product->discount_price == NULL) {
                    $price = $product->selling_price;
                    // Calculate the product details                   
                    $productDetails = [
                        'product_id' => $product->id,
                        'rowId' => $productRowId,
                        'product_thambnail' => $product->product_thambnail,
                        'product_name' => $product->product_name,
                        'price' => $price,
                        'gst' => $price * ($product->gst_percent / 100),
                        'qty' => $cart->qty,
                        'price_with_gst' =>  round($product->selling_price * (1 + ($product->gst_percent / 100)) * (int)$cart->qty, 2),
                        'weight' => $product?->weight ?? 1,
                        'color' => $cart->options->color,
                        'size' => $cart->options->size,
                    ];
                } else {
                    $productDetails = [
                        'product_id' => $product->id,
                        'rowId' => $productRowId,
                        'product_thambnail' => $product->product_thambnail,
                        'product_name' => $product->product_name,
                        'price' => $product->discount_price,
                        'gst' => $product->discount_price * ($product->gst_percent / 100),
                        'qty' => $cart->qty,
                        'price_with_gst' => round($product->discount_price * (1 + ($product->gst_percent / 100)) * (int)$cart->qty, 2),
                        'weight' => $product?->weight ?? 1,
                        'color' => $cart->options->color,
                        'size' => $cart->options->size,
                    ];
                }
                // Store the product details in the array
                $cartDetails[] = $productDetails;
                // Calculate the total weight and cart total
                $totalWeight += $product->weight;
                $cartTotal += round($productDetails['price_with_gst'], 2);
            }
        }

        return response()->json([
            'carts' => $cartDetails,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
            'totalWeight' => $totalWeight,
        ]);
    }

    public function CartRemove($rowId)
    {
        Cart::remove($rowId);
        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
            ]);
        }
        return response()->json(['success' => 'Successfully removed from cart']);
    }

    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
            ]);
        }
        return response()->json('Decrement');
    }

    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
            ]);
        }
        return response()->json('Increment');
    }

    public function CouponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => Session()->get('coupon')['coupon_name'],
                'coupon_discount' => Session()->get('coupon')['coupon_discount'],
                'discount_amount' => Session()->get('coupon')['discount_amount'],
                'total_amount' => Session()->get('coupon')['total_amount'],
            ));
        } else {
            $carts = Cart::content();
            $cartQty = $carts->count();
            $cartTotal = 0;
            $cartDetails = [];
            $totalWeight = 0;

            foreach ($carts as $cart) {
                // Assuming product_id is a column in the Cart model representing the product ID
                $productId = $cart->id;
                $productRowId = $cart->rowId;

                // Query the product from the Product table
                $product = Product::find($productId);

                if ($product) {
                    if ($product->discount_price == NULL) {
                        // Calculate the product details
                        $productDetails = [
                            'product_id' => $product->id,
                            'rowId' => $productRowId,
                            'product_thambnail' => $product->product_thambnail,
                            'product_name' => $product->product_name,
                            'price' => $product->selling_price,
                            'gst' => $product->selling_price * ($product->gst_percent / 100),
                            'qty' => $cart->qty,
                            'price_with_gst' =>  round($product->selling_price * (1 + ($product->gst_percent / 100)) * (int)$cart->qty, 2),
                            'weight' => $product->weight,
                            'color' => $cart->options->color,
                            'size' => $cart->options->size,
                        ];
                    } else {
                        $productDetails = [
                            'product_id' => $product->id,
                            'rowId' => $productRowId,
                            'product_thambnail' => $product->product_thambnail,
                            'product_name' => $product->product_name,
                            'price' => $product->discount_price,
                            'gst' => $product->discount_price * ($product->gst_percent / 100),
                            'qty' => $cart->qty,
                            'price_with_gst' => round($product->discount_price * (1 + ($product->gst_percent / 100)) * (int)$cart->qty, 2),
                            'weight' => $product->weight,
                            'color' => $cart->options->color,
                            'size' => $cart->options->size,
                        ];
                    }


                    // Store the product details in the array
                    $cartDetails[] = $productDetails;

                    // Calculate the total weight and cart total
                    $totalWeight += round($product->weight * (int)$cart->qty, 2);
                    $cartTotal += round($productDetails['price_with_gst'], 2);
                }
            }
            $refferal_code = cache()->get('referral_code');
            if($refferal_code){
                $affiliate = Affiliate::where('referral_code',$refferal_code)->first();
                if($affiliate){
                    $affiliate_discount_total = $cartTotal - (($cartTotal/100) * $affiliate->discount_rate);
                }
            }


            return response()->json(array(
                'total' => $cartTotal,
                'affiliate_discount_total'=>$affiliate_discount_total??0,
            ));
        }
    }

    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }

    public function CheckoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $address = Addresses::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
                $cities = ShipCities::orderBy('city_name', 'ASC')->get();
                $districts = ShipDistricts::orderBy('district_name', 'ASC')->get();
                $states = ShipState::orderBy('state_name', 'ASC')->get();
                $cartTotal = 0;
                $cartDetails = [];
                $totalWeight = 0;

                // logic
                foreach ($carts as $cart) {
                    // Assuming product_id is a column in the Cart model representing the product ID
                    $productId = $cart->id;
                    $productRowId = $cart->rowId;

                    // Query the product from the Product table
                    $product = Product::find($productId);

                    if ($product) {
                        if ($product->discount_price == NULL) {
                            // Calculate the product details
                            $productDetails = [
                                'product_id' => $product->id,
                                'rowId' => $productRowId,
                                'product_thambnail' => $product->product_thambnail,
                                'product_name' => $product->product_name,
                                'price' => $product->selling_price,
                                'gst' => $product->selling_price * ($product->gst_percent / 100),
                                'qty' => $cart->qty,
                                'price_with_gst' =>  round($product->selling_price * (1 + ($product->gst_percent / 100)) * (int)$cart->qty, 2),
                                'weight' => $product->weight,
                                'color' => $cart->options->color,
                                'size' => $cart->options->size,
                            ];
                        } else {
                            $productDetails = [
                                'product_id' => $product->id,
                                'rowId' => $productRowId,
                                'product_thambnail' => $product->product_thambnail,
                                'product_name' => $product->product_name,
                                'price' => $product->discount_price,
                                'gst' => $product->discount_price * ($product->gst_percent / 100),
                                'qty' => $cart->qty,
                                'price_with_gst' => round($product->discount_price * (1 + ($product->gst_percent / 100)) * (int)$cart->qty, 2),
                                'weight' => $product->weight,
                                'color' => $cart->options->color,
                                'size' => $cart->options->size,
                            ];
                        }


                        // Store the product details in the array
                        $cartDetails[] = $productDetails;

                        // Calculate the total weight and cart total
                        $totalWeight += round($product->weight * (int)$cart->qty, 2);
                        $cartTotal += round($productDetails['price_with_gst'], 2);
                    }
                }

                $shipping_charges = 0;
                if ($cartTotal > 0) {
                    if ($totalWeight <= 1) {
                        $shipping_charges  = 50;
                    }
                    if ($totalWeight <= 2) {
                        $shipping_charges  = 100;
                    }
                    if ($totalWeight <= 3) {
                        $shipping_charges  = 200;
                    }
                    if ($totalWeight >= 3) {
                        $shipping_charges  = 200;
                    }
                    if ($cartTotal >= 5000) {
                        $shipping_charges = 0;
                    }
                }

                $cartTotal = $cartTotal + $shipping_charges;
                $refferal_code = cache()->get('referral_code');
                $affiliate_discount_total = 0;
                if($refferal_code){
                    $affiliate = Affiliate::where('referral_code',$refferal_code)->first();
                    if($affiliate){
                        $affiliate_discount_total = $cartTotal - (($cartTotal/100) * $affiliate->discount_rate);
                    }
                }
                return view('frontend.checkout.checkout_view', compact('address','affiliate_discount_total', 'carts', 'districts', 'states', 'shipping_charges', 'cartQty', 'cartTotal', 'cities'));
            } else {
                $notification = array(
                    'message' => 'Add products to the cart',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'You need to login first',
                'alert-type' => 'error'
            );
            return redirect()->route('mobilelogin')->with($notification);
        }
    }
}
