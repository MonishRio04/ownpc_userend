<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDivision;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;


class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id){
        $ship = ShipDistricts::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($ship);
    }

    public function StateGetAjax($district_id){
        $ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($ship);
    }

    public function CheckoutStore(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['division_id'] = $request->division_id;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['district_id'] = $request->district_id;
        $data['post_code'] = $request->post_code;
        $data['state_id'] = $request->state_id;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes;
        $cartTotal = $request->cartTotal;
        if($request->payment_option == 'stripe'){
            return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif($request->payment_option == 'card'){
            return 'card page';
        }else{
            return view('frontend.payment.cash',compact('data','cartTotal'));
        }
    }
}
