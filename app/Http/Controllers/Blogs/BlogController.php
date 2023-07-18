<?php

namespace App\Http\Controllers\Blogs;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->get();
        // $blogs = Blog::latest()->get();
        return view('blogs.blog-list', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blogs.blog-add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->save('assets/blog-photos/' . $image_name);
            $save_url = 'assets/blog-photos/' . $image_name;

            Blog::insert([
                'category_id'  =>  $request->category_id,
                'title'  =>  $request->title,
                'image'    =>  $save_url,
                'description'   =>  $request->description,
                'created_at' =>  Carbon::now(),
            ]);
        } else {
            Blog::insert([
                'category_id'  =>  $request->category_id,
                'title'  =>  $request->title,
                'description'   =>  $request->description,
                'created_at' =>  Carbon::now(),
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

    public function update(Request $request, Blog $blog)
    {
        $blog_id = $request->id;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->save('assets/blog-photos/' . $image_name);
            $save_url = 'assets/blog-photos/' . $image_name;
            Blog::findOrFail($blog_id)->update([
                'category_id'  =>  $request->category_id,
                'title'  =>  $request->title,
                'image'    =>  $save_url,
                'description'   =>  $request->description,
                'updated_at' => Carbon::new(),
            ]);
            return redirect()->route('all.blog');
        } else {

            Blog::findOrFail($blog_id)->update([
                'category_id'  =>  $request->category_id,
                'title'  =>  $request->title,
                'description'   =>  $request->description,
                'updated_at' => Carbon::new(),

            ]);

            return redirect()->route('all.blog');
        }
    }

    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->back();
    }
}
