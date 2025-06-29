<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function StoreReview(Request $request){
        $product = $request->product_id;
        $vendor = $request->hvendor_id;
        $request->validate([
            'comment' => 'required',
        ]);
        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->quality,
            'vendor_id' => $vendor,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Thanks for the review and update shortly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function PendingReview(){
        $review = Review::where('status',0)->orderBy('id','DESC')->get();
        return view('backend.review.pending_review',compact('review'));
    }

    public function PendingApprove($id){
        Review::where('id',$id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Review approved successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function PublishReview(){
        $review = Review::where('status',1)->orderBy('id','DESC')->get();
        return view('backend.review.publish_review',compact('review'));
    }

    public function ReviewDelete($id){
        Review::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Review deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function VendorAllReview(){
        $id = Auth::user()->id;
        $review = Review::where('vendor_id',$id)->where('status',1)->orderBy('id','DESC')->get();
        return view('vendor.backend.review.approve_review',compact('review'));
    }
}
