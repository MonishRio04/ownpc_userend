<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function AddToWishList(Request $request, $product_id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if(!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                if($request->ajax()){
                    return response()->json(['success' => 'Successfully Added on Your Wishlist']);
                }
                return redirect()->to('wishlist')->with('success', 'Successfully Added on Your Wishlist');
            } else {
                if($request->ajax()){
                    return response()->json(['error' => 'This product has already added on your wishlist']);
                }
                return redirect()->to('wishlist')->with('error', 'This product has already added on your wishlist');                
            }
        }else{
            if($request->ajax()){
                return response()->json(['error' => 'At first login your account']);
            }
            return redirect()->to('login')->with('error', 'At first login your account');
        }
    }

    public function AllWishlist(){
        $data['wishlists'] = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return view('frontend.wishlist.view_wishlist',$data);
    }

    public function GetWishlistProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        $wishQty = $wishlist->count();
        return response()->json(['wishlist'=>$wishlist,'wishQty'=> $wishQty]);
    }

    public function WishlistRemove($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Successfully product removed from wishlist']);
    }
}
