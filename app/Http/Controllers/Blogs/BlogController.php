<?php

namespace App\Http\Controllers\Blogs;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $admins = User::where('role_id', 1)->get();
        return view('blogs.blog-add', compact('categories', 'admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'content' => 'required',
            'searchable' => 'required',
            'status' => 'required|in:publish,draft',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'seo_title' => 'requiredIf:searchable,1|max:200',
            // 'seo_image' => 'requiredIf:searchable,1',
            'seo_description' => 'requiredIf:searchable,1',
        ]);

        if ($request->file('image')) {
            $image = uploadImage($request->file('image'), 'blog-photos');
        }
        if ($request->file('seo_image')) {
            $seo_image = uploadImage($request->file('seo_image'), 'blog-photos');
        }
        if ($request->file('facebook_image')) {
            $facebook_image = uploadImage($request->file('facebook_image'), 'blog-photos');
        }
        if ($request->file('twitter_image')) {
            $twitter_image = uploadImage($request->file('twitter_image'), 'blog-photos');
        }

        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->get('content'),
            'searchable' => $request->searchable,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'image' => $image ?? null,
            'seo_title' => $request->seo_title,
            'seo_image' => $seo_image ?? null,
            'seo_description' => $request->seo_description,
            'facebook_title' => $request->facebook_title,
            'facebook_image' => $facebook_image ?? null,
            'facebook_description' => $request->facebook_description,
            'twitter_title' => $request->twitter_title,
            'twitter_image' => $twitter_image ?? null,
            'twitter_description' => $request->twitter_description,
        ]);

        return redirect()->route('blog.index');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.blog-details', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $admins = User::where('role_id', 1)->get();
        return view('blogs.blog-edit', compact('blog', 'categories', 'admins'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'content' => 'required',
            'searchable' => 'required',
            'status' => 'required|in:publish,draft',
            'category_id' => 'required|exists:categories,id',
            'seo_title' => 'requiredIf:searchable,1|max:200',
            'seo_image' => 'requiredIf:searchable,1',
            'seo_description' => 'requiredIf:searchable,1',
        ]);

        if ($request->file('image')) {
            $image = uploadImage($request->file('image'), 'blog-photos');
        }
        if ($request->file('seo_image')) {
            $seo_image = uploadImage($request->file('seo_image'), 'blog-photos');
        }
        if ($request->file('facebook_image')) {
            $facebook_image = uploadImage($request->file('facebook_image'), 'blog-photos');
        }
        if ($request->file('twitter_image')) {
            $twitter_image = uploadImage($request->file('twitter_image'), 'blog-photos');
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->get('content'),
            'searchable' => $request->searchable,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'image' => $image ?? null,
            'seo_title' => $request->seo_title,
            'seo_image' => $seo_image ?? null,
            'seo_description' => $request->seo_description,
            'facebook_title' => $request->facebook_title,
            'facebook_image' => $facebook_image ?? null,
            'facebook_description' => $request->facebook_description,
            'twitter_title' => $request->twitter_title,
            'twitter_image' => $twitter_image ?? null,
            'twitter_description' => $request->twitter_description,
        ]);
        $blog->save();
        // $blog = Blog::find($blog->id);

        // $blog->title = $request->title;
        // $blog->content = $request->get('content');
        // $blog->searchable = $request->searchable;
        // $blog->status = $request->status;
        // $blog->category_id = $request->category_id;
        // $blog->user_id = $request->user_id;
        // $blog->image = $image ?? null;
        // $blog->seo_title = $request->seo_title;
        // $blog->seo_image = $seo_image ?? null;
        // $blog->seo_description = $request->seo_description;
        // $blog->facebook_title = $request->facebook_title;
        // $blog->facebook_image = $facebook_image ?? null;
        // $blog->facebook_description = $request->facebook_description;
        // $blog->twitter_title = $request->twitter_title;
        // $blog->twitter_image = $twitter_image ?? null;
        // $blog->twitter_description = $request->twitter_description;

        // $blog->save();
        return redirect()->route('blog.index');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index');
    }
}
