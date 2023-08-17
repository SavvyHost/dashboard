<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Dashboard\CategoryResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogController extends Controller
{
    use APITrait;
    public function index()
    {
        $blogs = BlogResource::collection(Blog::all());
        // $blogs = Blog::with('category')->get();

        return $this->sendSuccess("All Blogs.", compact('blogs'));
    }

    public function create()
    {
        $categories = CategoryResource::collection(Category::all());
        $admins = User::where('role_id', 1)->get();
        // $user_login = Auth::user()->id;
        return $this->sendSuccess('', compact('categories', 'admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'status' => 'in:publish,draft',
            'category_id' => 'exists:categories,id',
            'user_id' => 'exists:users,id',
            // 'seo_title' => 'requiredIf:searchable,1|max:200',
            // 'seo_description' => 'requiredIf:searchable,1',
            // 'seo_image' => 'requiredIf:searchable,1',
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
            'searchable' => $request->searchable ?? 0,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id ?? auth()->user()->id,
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

        $tags = $request->tags ?? [];
        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'blog_id' => $blog->id,
            ]);
        }

        $blog = new BlogResource($blog);
        return $this->sendSuccess('Blog is created successfully', compact('blog'), 201);
    }

    public function show($id)
    {
        try {
            $blog = new BlogResource(Blog::where('id', $id)->firstorFail());
            return $this->sendSuccess('Blog Found', compact('blog'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Blog Not Found', [], 404);
        }
    }

    public function edit($id)
    {
        try {
            $blog = new BlogResource(Blog::where('id', $id)->firstorFail());
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Blog Not Found', [], 404);
        }

        $categories = CategoryResource::collection(Category::all());
        $admins = User::where('role_id', 1)->get();

        return $this->sendSuccess('', compact('categories', 'admins', 'blog'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $blog = Blog::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Blog Not Found', [], 404);
        }

        $request->validate([
            'title' => 'required|string|max:200',
            'status' => 'in:publish,draft',
            'category_id' => 'exists:categories,id',
            // 'seo_title' => 'requiredIf:searchable,1|max:200',
            // 'seo_description' => 'requiredIf:searchable,1',
        ]);

        if ($request->file('image')) {
            $image = uploadImage($request->file('image'), 'blog-photos');
            $blog->update([
                'image' =>  asset($image)
            ]);
        }
        if ($request->file('seo_image')) {
            $seo_image = uploadImage($request->file('seo_image'), 'blog-photos');
            $blog->update([
                'seo_image' => asset($seo_image)
            ]);
        }

        if ($request->file('facebook_image')) {
            $facebook_image = uploadImage($request->file('facebook_image'), 'blog-photos');
            $blog->update([
                'facebook_image' => asset($facebook_image)
            ]);
        }

        if ($request->file('twitter_image')) {
            $twitter_image = uploadImage($request->file('twitter_image'), 'blog-photos');
            $blog->update([
                'twitter_image' => asset($twitter_image)
            ]);
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->get('content'),
            'searchable' => $request->searchable,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'facebook_title' => $request->facebook_title,
            'facebook_description' => $request->facebook_description,
            'twitter_title' => $request->twitter_title,
            'twitter_description' => $request->twitter_description,
        ]);

        $blog->save();

        $blog->tags()->delete();

        $tags = $request->tags ?? [];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'blog_id' => $blog->id,
            ]);
        }
        $blog = new BlogResource($blog);

        return $this->sendSuccess('Blog is updated successfully.', compact('blog'));
    }

    public function destroy(string $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return $this->sendSuccess('Blog deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Blog Not Found.", [], 404);
        }
    }
}