<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogComments;
use App\Models\BlogPost;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BlogController extends Controller
{
    public function AllBlogCategory()
    {
        $blogcategories = BlogCategory::latest()->get();
        return view('backend.blog.category.blog_category_all', compact('blogcategories'));
    }

    public function AddBlogCategory()
    {
        return view('backend.blog.category.blogcategory_add');
    }

    public function StoreBlogCategory(Request $request)
    {

        BlogCategory::insert([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Blog Category Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function EditBlogCategory($id)
    {
        $blogcategories = BlogCategory::findOrFail($id);
        return view('backend.blog.category.blog_category_edit', compact('blogcategories'));
    }

    public function UpdateBlogCategory(Request $request)
    {
        $blog_id = $request->id;
        BlogCategory::findOrFail($blog_id)->update([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Blog Category Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Category Delete successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    //// Blog Post Methods ////

    public function AllBlogPost()
    {
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.blog_post_all', compact('blogpost'));
    }

    public function AddBlogPost(){
        $blogcategory = BlogCategory::latest()->get();
        return view('backend.blog.post.blog_post_add',compact('blogcategory'));
    }

    public function StoreBlogPost(Request $request)
    {
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $manager->read($image)
                ->resize(1103, 906, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('upload/blog/'.$name_gen);
        // Image::make($image)->resize(1103, 906)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;
        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request?->post_long_description??'',
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.post')->with($notification);
    }

    public function EditBlogPost($id){
        $blogcategory = BlogCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('backend.blog.post.blogpost_edit',compact('blogcategory','blogpost'));
    }

    public function UpdateBlogPost(Request $request)
    {
        $post_id = $request->id;
        $old_img = $request->old_image;
        if ($request->file('post_image')) {
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $manager->read($image)
                    ->resize(1103, 906, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('upload/blog/'.$name_gen);
        // Image::make($image)->resize(1103, 906)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'. $name_gen;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            BlogPost::findOrFail($post_id)->update([
                'category_id' => $request->category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
                'post_short_description' => $request->post_short_description,
                'post_long_description' => $request->post_long_description,
                'post_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Post Updated with image successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blog.post')->with($notification);
        } else {
            BlogPost::findOrFail($post_id)->update([
                'category_id' => $request->category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
                'post_short_description' => $request->post_short_description,
                'post_long_description' => $request->post_long_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Post Updated without image successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blog.post')->with($notification);
        }
    }

    public function DeleteBlogPost($id){
        $blogpost = BlogPost::findOrFail($id);
        $img = $blogpost->post_image;
        unlink($img);
        BlogPost::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Post Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Frontend Blog All

    public function AllBlog(){
        $blogcategories = BlogCategory::latest()->get();
        $blogpost =  BlogPost::latest()->get();
        return view('frontend.blog.home_blog',compact('blogcategories','blogpost'));
    }

    public function BlogDetails($id,$slug){
        $blogcategories = BlogCategory::latest()->get();
        $blogdetails = BlogPost::findOrFail($id);
        $breadcat = BlogCategory::where('id',$id)->get();
        $comments = BlogComments::with('user')->where('blog_post_id',$id)->where('status','approved')->get();
        return view('frontend.blog.blog_details',compact('blogcategories','blogdetails','breadcat','comments'));
    }

    public function BlogPostCategory($id,$slug){
        $blogcategories = BlogCategory::latest()->get();
        $blogpost = BlogPost::where('category_id',$id)->get();
        $breadcat = BlogCategory::where('id',$id)->get();
        return view('frontend.blog.blog_category_post',compact('blogcategories','blogpost','breadcat'));
    }

    public function BlogComments(){
        $data['comments'] = BlogComments::with('blog')->get();
        return view('backend.blog.comments.index', $data);      
    }
    public function BlogCommentsApprove(int $id){
        BlogComments::find($id)->update([
            'status'=>'approved'
        ]);
        return redirect()->back()->with([ 'message' => 'Blog Commented successfully Approved','alert-type' => 'success']);
    }

    public function BlogCommentsDelete(int $id){
        BlogComments::find($id)->delete();
        return redirect()->back()->with([ 'message' => 'Blog Commented successfully Deleted','alert-type' => 'success']);
    }

    public function BlogCommentPost(Request $request){
        BlogComments::create([
            'blog_post_id' => $request->blog_post_id,           
            'comment' => $request->comment,
            'user_id' => Auth::check()?Auth::id():null,
            'status' => 'pending',
        ]);
        return redirect()->back()->with([ 'message' => 'Blog Commented successfully Waiting for approval','alert-type' => 'success']);
    }
}
