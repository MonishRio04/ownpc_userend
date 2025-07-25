<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class BannerController extends Controller
{
    public function AllBanner()
    {
        $banner = Banner::latest()->get();
        return view('backend.banner.banner_all', compact('banner'));
    }

    public function AddBanner()
    {
        return view('backend.banner.banner_add');
    }

    public function StoreBanner(Request $request)
    {
        $image = $request->file('banner_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $manager->read($image)
                ->resize(768, 450, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('upload/banner/' . $name_gen);
        // Image::make($image)->resize(768, 450)->save('upload/banner/' . $name_gen);
        $save_url = 'upload/banner/' . $name_gen;
        Banner::insert([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Banner Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.banner')->with($notification);
    }

    public function EditBanner($id)
    {
        $banners = Banner::findOrFail($id);
        return view('backend.banner.banner_edit', compact('banners'));
    }

    public function UpdateBanner(Request $request)
    {
        $banner_id = $request->id;
        $old_img = $request->old_image;
        if ($request->file('banner_image')) {
            $image = $request->file('banner_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // Image::make($image)->resize(768,450)->save('upload/banner/'.$name_gen);
            $manager = new ImageManager(new Driver());
            $manager->read($image)
                    ->resize(768, 450, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('upload/banner/'.$name_gen);
            $save_url = 'upload/banner/'.$name_gen;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            Banner::findOrFail($banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
                'banner_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Banner Updated with image successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.banner')->with($notification);
        } else {
            Banner::findOrFail($banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
            ]);

            $notification = array(
                'message' => 'Banner Updated without image successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.banner')->with($notification);
        }
    }

    public function DeleteBanner($id){
        $banner = Banner::findOrFail($id);
        $img = $banner->banner_image;
        unlink($img);
        Banner::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Banner Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
