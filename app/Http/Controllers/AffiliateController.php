<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AffiliateController extends Controller
{
    public function index()
    {

        return view('affiliate.index');
    }

    public function login()
    {
        return view('affiliate.login');
    }
    public function loginPost()
    {
        $data = request()->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);
        if(request()->get('for')=='otp') {
            $affiliate = Affiliate::where('phone', $data['mobile'])->first();
            if(!$affiliate) {
                return response()->json([
                    'status' => false,
                    'message' => 'Affiliate not found',
                ]);
            }
            if(!Hash::check($data['password'], $affiliate->password)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Invalid Password',
                ]);
            }
            return response()->json([
                'status' => true,
                'message' => 'OTP sent successfully',
                'user'=> $affiliate,
            ]);

        }
        $otp = implode('',request()->get('otp'));
        if (auth()->guard('affiliate')->attempt(['phone' => $data['mobile'], 'password' => $data['password']])) {
            if(request()->ajax()){
                return response()->json([
                    'status' => true,
                    'message' => 'Login successful',
                    'url'=> route('affiliate.dashboard'),
                ]);
            }
            return redirect()->route('affiliate.dashboard')->with('success', 'Login successful!');
        }
        if(request()->ajax()){
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials',
            ]);
        }
        return back()->with('error', 'Invalid credentials');
    }
    public function registration()
    {
        return view('affiliate.register');
    }

    public function forgetPassword()
    {
        return view('affiliate.forget_password');
    }

    public function registerationPost(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:affiliates,phone,except,id',
            'password' => 'required|min:6|confirmed',
        ]);
        Affiliate::create([
            'name' => $data['name'],
            'phone' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'referral_code' => strtoupper(trim($data['name'][2])) . '_' . uniqid(),
        ]);
        auth()->guard('affiliate')->attempt(['phone' => $data['mobile'], 'password' => $data['password']]);
        return redirect()->route('affiliate.dashboard')->with('success', 'Registration successful! Please log in.');
    }

    public function dashboard()
    {
        $data['total_earnings'] = Order::where('referral_code', auth()->guard('affiliate')->user()->referral_code)
            ->sum(DB::raw('amount * (' . auth()->guard('affiliate')->user()->commision_rate . ' / 100)'));
        $data['month_earnings'] = Order::where('referral_code', auth()->guard('affiliate')->user()->referral_code)
            ->whereRaw("MONTH(STR_TO_DATE(order_date, '%d %M %Y')) = ?", [Carbon::now()->month])
            ->whereRaw("YEAR(STR_TO_DATE(order_date, '%d %M %Y')) = ?", [Carbon::now()->year])
            ->sum(DB::raw('amount * (' . auth()->guard('affiliate')->user()->commision_rate . ' / 100)'));
        $data['available_balance'] = Order::where('referral_code', auth()->guard('affiliate')->user()->referral_code)
            ->whereRaw("MONTH(STR_TO_DATE(delivered_date, '%d %M %Y')) = ?", [Carbon::now()->subDays(15)])
            ->sum(DB::raw('amount * (' . auth()->guard('affiliate')->user()->commision_rate . ' / 100)'));
        $orders = Order::where('referral_code', auth()->guard('affiliate')->user()->referral_code)->pluck('id')->toArray();
        $products_ordered = OrderItem::whereIn('order_id', $orders)->pluck('product_id')?->toArray();
        $data['products_count'] = array_count_values($products_ordered);
        $data['products'] = Product::whereIn('id', $products_ordered)->with('category')->get();
        return view('affiliate.dashboard', $data);
    }

    public function products(Request $request)
    {
        $data['products'] = Product::with('category')->where('status', 1);
        if ($request->get('category_id')) {
            $data['products'] = $data['products']->where('category_id', $request->get('category_id'));
        }
        if ($request->get('subcategory_id')) {
            $data['products'] = $data['products']->where('subcategory_id', $request->get('subcategory_id'));
        }
        if ($request->get('brand_id')) {
            $data['products'] = $data['products']->where('brand_id', $request->get('brand_id'));
        }
        $data['products'] = $data['products']->get();
        $data['brands'] = Brand::pluck('brand_name', 'id');
        $data['categories'] = Category::with('sub')->where('status', 1)->pluck('category_name', 'id');
        $data['subcategories'] = SubCategory::where('status', 1)->pluck('subcategory_name', 'id');
        return view('affiliate.products', $data);
    }

    public function logout()
    {
        auth()->guard('affiliate')->logout();
        return redirect()->route('affiliate.login')->with('success', 'Logout successful!');
    }

    public function profile()
    {
        $data['affiliateData'] = auth()->guard('affiliate')->user();
        $data['total_earnings'] = Order::where('referral_code', auth()->guard('affiliate')->user()->referral_code)
            ->sum(DB::raw('amount * (' . auth()->guard('affiliate')->user()->commision_rate . ' / 100)'));
        $data['month_earnings'] = Order::where('referral_code', auth()->guard('affiliate')->user()->referral_code)
            ->whereRaw("MONTH(STR_TO_DATE(order_date, '%d %M %Y')) = ?", [Carbon::now()->month])
            ->whereRaw("YEAR(STR_TO_DATE(order_date, '%d %M %Y')) = ?", [Carbon::now()->year])
            ->sum(DB::raw('amount * (' . auth()->guard('affiliate')->user()->commision_rate . ' / 100)'));
        $data['available_balance'] = Order::where('referral_code', auth()->guard('affiliate')->user()->referral_code)
            ->whereRaw("MONTH(STR_TO_DATE(delivered_date, '%d %M %Y')) = ?", [Carbon::now()->subDays(15)])
            ->sum(DB::raw('amount * (' . auth()->guard('affiliate')->user()->commision_rate . ' / 100)'));
        return view('affiliate.profile', $data);
    }
    public function profilePost(Request $request)
    {
        $affiliate = Auth::guard('affiliate')->user();

        // Validate incoming request
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|max:255|unique:affiliates,email,' . $affiliate->id,
            'phone'                 => 'nullable|string|max:20',
            'address'               => 'nullable|string|max:255',
            'current_password'      => 'nullable|string',
            'new_password'          => 'nullable|string|min:8|confirmed', // new_password + new_password_confirmation
        ]);

        // Update basic fields
        $affiliate->name = $request->name;
        $affiliate->email = $request->email;
        $affiliate->phone = $request->phone;
        $affiliate->address = $request->address;
        $affiliate->bank_details = json_encode($request->bank_details);
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/affiliate_images'), $filename);
            // Delete old photo if exists
            if (!empty($affiliate->photo) && file_exists(public_path('upload/affiliate_images/' . $affiliate->photo))) {
                unlink(public_path('upload/affiliate_images/' . $affiliate->photo));
            }

            $affiliate->photo = $filename;
        }

        // Handle password change
        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (Hash::check($request->current_password, $affiliate->password)) {
                $affiliate->password = Hash::make($request->new_password);
            } else {
                return back()->withErrors(['current_password' => 'Current password does not match.'])->withInput();
            }
        }

        // Save changes
        $affiliate->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function mySale()
    {
        $data['orders'] = Order::where('referral_code', auth()->guard('affiliate')->user()->referral_code)->get();
        return view('affiliate.my_sale', $data);
    }
}
