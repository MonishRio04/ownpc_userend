<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_all', compact('categories'));
    }

    public function AddCategory()
    {
        return view('backend.category.category_add');
    }
    public function toggleHome(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
        $category->add_to_homepage = $request?->status?1:0;
        $category->save();

        $message = $request->status
            ? 'Category added to homepage successfully.'
            : 'Category removed from homepage successfully.';
        return response()->json(['message' => $message]);
    }

    public function storeCategory(Request $request)
    {
        $image = $request->file('category_image');

        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $destinationPathThumbnail = public_path('upload/category');
            if (!file_exists($destinationPathThumbnail)) {
                mkdir($destinationPathThumbnail, 0755, true);
            }
            $manager = new ImageManager(new GdDriver());
            $manager->read($image)
                ->resize(120, 120, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($destinationPathThumbnail . '/' . $name_gen);
            $save_url = 'upload/category/' . $name_gen;
            Category::insert([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'category_image' => $save_url,
            ]);
            return redirect()->route('all.category')->with([
                'message' => 'Category inserted successfully',
                'alert-type' => 'success'
            ]);
        }

        return back()->with([
            'message' => 'No image found',
            'alert-type' => 'error'
        ]);
    }

    public function EditCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->id;
        $old_img = $request->old_image;
        if ($request->file('category_image')) {
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new GdDriver());
            $manager->read($image)
                ->resize(120, 120, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('upload/category/' . $name_gen);
            $save_url = 'upload/category/' . $name_gen;
            // Image::make($image)->resize(120,120)->save('upload/category/' . $name_gen);
            // $save_url = 'upload/category/'. $name_gen;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            Category::findOrFail($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'category_image' => $save_url,
                'status' => $request->status ?? 1,
            ]);

            $notification = array(
                'message' => 'Category Updated with image successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        } else {
            Category::findOrFail($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'status' => $request->status ?? 1,
            ]);

            $notification = array(
                'message' => 'Category Updated without image successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }
    }

    public function DeleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $img = $category->category_image;
        unlink($img);
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
