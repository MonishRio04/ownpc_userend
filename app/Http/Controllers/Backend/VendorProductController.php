<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Image;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class VendorProductController extends Controller
{
    public function VendorAllProduct(){
        $id = Auth::user()->id;
        $products = Product::where('vendor_id',$id)->latest()->get();
        return view('vendor.backend.product.vendor_product_all', compact('products'));
    }

    public function VendorAddProduct()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('vendor.backend.product.vendor_product_add', compact('brands', 'categories'));
    }

    public function VendorGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }

    public function VendorStoreProduct(Request $request)
    {
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $manager->read($image)
                ->resize(800, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('upload/products/thambnail/' . $name_gen);
        // Image::make($image)->resize(800, 800)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'hot_details' => $request->hot_details,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            'vendor_id' => Auth::user()->id,
            'status' => 1,
            'created_at' => Carbon::now(),
            'weight' => $request->weight,
            'gst_percent' => $request->gst,
        ]);

        $images = $request->file('multi_image');
        foreach ((array)$images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            // Image::make($img)->resize(800, 800)->save('upload/products/multi-image/' . $make_name);
            $manager = new ImageManager(new Driver());
            $manager->read($img)
                    ->resize(800, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }


        $notification = array(
            'message' => 'Vendor Product Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('vendor.all.product')->with($notification);
    }

    public function VendorEditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('vendor.backend.product.vendor_product_edit', compact('brands', 'categories','products', 'subcategory', 'multiImgs'));
    }

    public function VendorUpdateProduct(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'hot_details' => $request->hot_details,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Vendor Product Updated without image successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('vendor.all.product')->with($notification);
    }

    public function VendorUpdateProductThambnail(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $manager->read($image)
                ->resize(800, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('upload/products/thambnail/' . $name_gen);
        // Image::make($image)->resize(800, 800)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }
        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Vendor Product Image Thumbnail updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function VendorUpdateProductMultiimage(Request $request)
    {
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $manager->read($img)
                    ->resize(800, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('upload/products/multi-image/' . $make_name);
            // Image::make($img)->resize(800, 800)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Vendor Product Multi Image updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function VendorMultiimgDelete($id){
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Vendor Product Multi Image deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function VendorProductInactive($id){
        Product::findOrFail($id)->update(['status'=>0]);
        $notification = array(
            'message' => 'Vendor Product Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function VendorProductActive($id){
        Product::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message' => 'Vendor Product Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function VendorProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();
        $imges = MultiImg::where('product_id',$id)->get();
        foreach($imges as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }
        $notification = array(
            'message' => 'Vendor Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
