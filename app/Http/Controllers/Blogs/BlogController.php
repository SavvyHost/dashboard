<?php

namespace App\Http\Controllers\Blogs;

use Image;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category', 'user')->get();
        // $blogs = Blog::latest()->get();
        return view('blogs.blog-list', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        // $admins = User::where('role_id', 1)->get();
        return view('blogs.blog-add', compact('categories'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //     ]);
    //     $image = $request->file('image');
    //     if ($image) {
    //         $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
    //         Image::make($image)->save('assets/blog-photos/' . $image_name);
    //         $save_url = 'assets/blog-photos/' . $image_name;

    //         Blog::insert([
    //             'category_id'  =>  $request->category_id,
    //             'title'  =>  $request->title,
    //             'image'    =>  $save_url,
    //             'description'   =>  $request->description,
    //             'created_at' =>  Carbon::now(),
    //         ]);
    //     } else {
    //         Blog::insert([
    //             'category_id'  =>  $request->category_id,
    //             'title'  =>  $request->title,
    //             'description'   =>  $request->description,
    //             'created_at' =>  Carbon::now(),
    //         ]);
    //     }
    //     return redirect()->route('all.blog');
    // }
    public function store(Request $request)
    {
        $categories = Category::all();
        $admins = User::where('role_id', 1)->get();

        if ($request->searchable) {
            $request->validate([
                'title' => 'required|string|max:200',
                'content' => 'required',
                'searchable' => 'required',
                'status' => 'required|in:publish,draft',
                'category_id' => 'required|exists:categories,id',
                'seo_title' => 'required|string|max:200',
                'seo_image' => 'required',
                'seo_description' => 'required',
            ]);
        } else {
            $request->validate([
                'title' => 'required|string|max:200',
                'content' => 'required',
                'searchable' => 'required',
                'status' => 'required|in:publish,draft',
                'category_id' => 'required|exists:categories,id',
            ]);
        }

        if ($request->file('image')) {
            $image_path = $request->file('image')->store('api/blogs', 'public');
        } else {
            $image_path = null;
        }
        if ($request->file('seo_image')) {
            $image_path = $request->file('seo_image')->store('api/seo_images', 'public');
        } else {
            $image_path = null;
        }
        if ($request->file('facebook_image')) {
            $image_path = $request->file('facebook_image')->store('api/facebook_images', 'public');
        } else {
            $image_path = null;
        }
        if ($request->file('twitter_image')) {
            $image_path = $request->file('twitter_image')->store('api/twitter_images', 'public');
        } else {
            $image_path = null;
        }

        /** user who make a login*/
        $user_id = Auth::user()->id;

        /** check user who make a login is admin or not */
        $check_admin = User::findorfail($user_id)->where('role_id', 1)->get();

        if ($check_admin == NULL) {
            $blog = Blog::create([
                'title' => $request->title,
                'content' => $request->content,
                'searchable' => $request->searchable,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'user_id' => $user_id,
                'image' => asset('storage/' . $image_path),
                'seo_title' => $request->seo_title,
                'seo_image' => asset('storage/' . $image_path),
                'seo_description' => $request->seo_description,
                'facebook_title' => $request->facebook_title,
                'facebook_image' => asset('storage/' . $image_path),
                'facebook_description' => $request->facebook_description,
                'twitter_title' => $request->twitter_title,
                'twitter_image' => asset('storage/' . $image_path),
                'twitter_description' => $request->twitter_description,
                'created_at' => Carbon::new(),
            ]);
        } else {
            $blog = Blog::create([
                'title' => $request->title,
                'content' => $request->content,
                'searchable' => $request->searchable,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'user_id' => $request->user_id,
                'image' => asset('storage/' . $image_path),
                'seo_title' => $request->seo_title,
                'seo_image' => asset('storage/' . $image_path),
                'seo_description' => $request->seo_description,
                'facebook_title' => $request->facebook_title,
                'facebook_image' => asset('storage/' . $image_path),
                'facebook_description' => $request->facebook_description,
                'twitter_title' => $request->twitter_title,
                'twitter_image' => asset('storage/' . $image_path),
                'twitter_description' => $request->twitter_description,
                'created_at' => Carbon::new(),
            ]);
        }

        return redirect()->route('all.blog');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.blog-details', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::orderBy('blog_category', 'ASC')->get();
        return view('blogs.blog-edit', compact('blogs', 'categories'));
    }

    // public function update(Request $request, Blog $blog)
    // {
    //     $blog_id = $request->id;
    //     $image = $request->file('image');
    //     if ($image) {
    //         $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
    //         Image::make($image)->save('assets/blog-photos/' . $image_name);
    //         $save_url = 'assets/blog-photos/' . $image_name;
    //         Blog::findOrFail($blog_id)->update([
    //             'category_id'  =>  $request->category_id,
    //             'title'  =>  $request->title,
    //             'image'    =>  $save_url,
    //             'description'   =>  $request->description,
    //             'updated_at' => Carbon::new(),
    //         ]);
    //         return redirect()->route('all.blog');
    //     } else {

    //         Blog::findOrFail($blog_id)->update([
    //             'category_id'  =>  $request->category_id,
    //             'title'  =>  $request->title,
    //             'description'   =>  $request->description,
    //             'updated_at' => Carbon::new(),

    //         ]);

    //         return redirect()->route('all.blog');
    //     }
    // }
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id); {
            $categories = Category::all();
            $admins = User::where('role_id', 1)->get();

            if ($request->searchable) {
                $request->validate([
                    'title' => 'required|string|max:200',
                    'content' => 'required',
                    'searchable' => 'required',
                    'status' => 'required|in:publish,draft',
                    'category_id' => 'required|exists:categories,id',
                    'seo_title' => 'required|string|max:200',
                    'seo_image' => 'required',
                    'seo_description' => 'required',
                ]);
            } else {
                $request->validate([
                    'title' => 'required|string|max:200',
                    'content' => 'required',
                    'searchable' => 'required',
                    'status' => 'required|in:publish,draft',
                    'category_id' => 'required|exists:categories,id',
                ]);
            }

            if ($request->file('image')) {
                $image_path = $request->file('image')->store('api/blogs', 'public');
            } else {
                $image_path = null;
            }
            if ($request->file('seo_image')) {
                $image_path = $request->file('seo_image')->store('api/seo_images', 'public');
            } else {
                $image_path = null;
            }
            if ($request->file('facebook_image')) {
                $image_path = $request->file('facebook_image')->store('api/facebook_images', 'public');
            } else {
                $image_path = null;
            }
            if ($request->file('twitter_image')) {
                $image_path = $request->file('twitter_image')->store('api/twitter_images', 'public');
            } else {
                $image_path = null;
            }

            /** user who make a login*/
            $user_id = Auth::user()->id;

            /** check user who make a login is admin or not */
            $check_admin = User::findorfail($user_id)->where('role_id', 1)->get();

            if ($check_admin == NULL) {
                $blog->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'searchable' => $request->searchable,
                    'status' => $request->status,
                    'category_id' => $request->category_id,
                    'user_id' => $user_id,
                    'image' => asset('storage/' . $image_path),
                    'seo_title' => $request->seo_title,
                    'seo_image' => asset('storage/' . $image_path),
                    'seo_description' => $request->seo_description,
                    'facebook_title' => $request->facebook_title,
                    'facebook_image' => asset('storage/' . $image_path),
                    'facebook_description' => $request->facebook_description,
                    'twitter_title' => $request->twitter_title,
                    'twitter_image' => asset('storage/' . $image_path),
                    'twitter_description' => $request->twitter_description,
                    'created_at' => Carbon::new(),
                ]);
            } else {
                $blog->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'searchable' => $request->searchable,
                    'status' => $request->status,
                    'category_id' => $request->category_id,
                    'status' => $request->status,
                    'user_id' => $request->user_id,
                    'image' => asset('storage/' . $image_path),
                    'seo_title' => $request->seo_title,
                    'seo_image' => asset('storage/' . $image_path),
                    'seo_description' => $request->seo_description,
                    'facebook_title' => $request->facebook_title,
                    'facebook_image' => asset('storage/' . $image_path),
                    'facebook_description' => $request->facebook_description,
                    'twitter_title' => $request->twitter_title,
                    'twitter_image' => asset('storage/' . $image_path),
                    'twitter_description' => $request->twitter_description,
                    'created_at' => Carbon::new(),
                ]);
            }
        }
        return redirect()->route('all.blog');
    }

    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->back();
    }
}