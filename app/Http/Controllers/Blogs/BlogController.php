<?php

namespace App\Http\Controllers\Blogs;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic;
use Intervention\Image\ImageManagerStatic as Image;


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
        return view('blogs.blog-add', compact('categories'));
    }

    public function store(Request $request)
    {
		$request->validate([
			'title' => 'required|string|max:200',
			'searchable' => 'required',
			'content' => 'required',
			'status' => 'required|in:publish,draft',
			'category_id' => 'required|exists:categories,id',
		
			'seo_title' => 'requiredIf:searchable,true|string|max:200',
			'seo_image' => 'requiredIf:searchable,true',
			'seo_description' => 'requiredIf:searchable,true',
		]);
	
		$blog = new Blog();
		
		$blog->title = $request->title;
		$blog->content = $request->content;
		$blog->searchable = $request->searchable;
		$blog->status = $request->status;
		$blog->category_id = $request->category_id;
		$blog->seo_title = $request->seo_title;
		$blog->seo_description = $request->seo_description;
		$blog->facebook_title = $request->facebook_title;
		$blog->facebook_description = $request->facebook_description;
		$blog->twitter_title = $request->twitter_title;
		$blog->twitter_description = $request->twitter_description;

		
		if ($request->file('image')) {
			$image = $request->file('image');
			$image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
			Image::make($image)->save('assets/blog-photos/' . $image_name);
			
            $blog->image = 'assets/blog-photos/' . $image_name;
        }
		if ($request->file('seo_image')) {
            $blog->seo_image = $request->file('image')->store('api/blogs', 'public');
        }
		if ($request->file('facebook_image')) {
            $blog->facebook_image = $request->file('image')->store('api/blogs', 'public');
        }
		if ($request->file('twitter_image')) {
            $blog->twitter_image = $request->file('image')->store('api/blogs', 'public');
        }
		if ($request->file('image')) {
            $blog->image = $request->file('image')->store('api/blogs', 'public');
        }
		
		$blog->user_id = Auth::user()->type == 1 ? $request->user_id : Auth::user()->id;
		
  
		$blog->save();

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
        $categories = Category::all();
        return view('blogs.blog-edit', compact('blog', 'categories'));
    }

    
    public function update(Request $request, $id)
    {
		$request->validate([
			'title' => 'required|string|max:200',
			'searchable' => 'required',
			'content' => 'required',
			'status' => 'required|in:publish,draft',
			'category_id' => 'required|exists:categories,id',
		
			'seo_title' => 'requiredIf:searchable,true|string|max:200',
			'seo_image' => 'requiredIf:searchable,true',
			'seo_description' => 'requiredIf:searchable,true',
		]);
	
		$blog = Blog::find($id);
	
		$blog->title = $request->title;
		$blog->content = $request->content;
		$blog->searchable = $request->searchable;
		$blog->status = $request->status;
		$blog->category_id = $request->category_id;
		$blog->seo_title = $request->seo_title;
		$blog->seo_description = $request->seo_description;
		$blog->facebook_title = $request->facebook_title;
		$blog->facebook_description = $request->facebook_description;
		$blog->twitter_title = $request->twitter_title;
		$blog->twitter_description = $request->twitter_description;
	
	
		if ($request->file('image')) {
			$image = $request->file('image');
			$image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
			Image::make($image)->save('assets/blog-photos/' . $image_name);
		
			$blog->image = 'assets/blog-photos/' . $image_name;
		}
		if ($request->file('seo_image')) {
			$blog->seo_image = $request->file('image')->store('api/blogs', 'public');
		}
		if ($request->file('facebook_image')) {
			$blog->facebook_image = $request->file('image')->store('api/blogs', 'public');
		}
		if ($request->file('twitter_image')) {
			$blog->twitter_image = $request->file('image')->store('api/blogs', 'public');
		}
		if ($request->file('image')) {
			$blog->image = $request->file('image')->store('api/blogs', 'public');
		}
	
		$blog->user_id = Auth::user()->type == 1 ? $request->user_id : Auth::user()->id;
		
		$blog->save();
	
		return redirect()->route('all.blog');
    }

    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->back();
    }
}
