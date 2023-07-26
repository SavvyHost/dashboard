<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    use APITrait;

    public function index()
    {
        $blogs = Blog::where('status', 'publish')->paginate(10);

        return $this->sendSuccess("Blogs Found", compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        $response = [
            'message' => 'specific blog with id',
            'blog' => $blog
        ];
        return response($response, 201);
    }

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

        $response = [
            'message' => 'blog is created successfully',
            'blog' => $blog,
            'categories' => $categories,
            'admins' => $admins,

        ];
        return response($response, 201);
    }


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
        $response = [
            'message' => 'blog updated successfully',
            'blog' => $blog,
            'categories' => $categories,
            'admins' => $admins,
        ];
        return response($response, 201);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        $response = [
            'message' => 'blog deleted successfully',
        ];
        return response($response, 201);
    }
}
