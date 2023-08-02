<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\APITrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogController extends Controller
{
    use APITrait;
    public function index()
    {
        $blogs = Blog::where('status', 'publish')->with('tags')->get();

        return $this->sendSuccess("All Blogs.", compact('blogs'), 200);
    }

	public function create() {
		$categories = Category::all();
		$admins = User::where('role_id', 1)->get();
		
		return $this->sendSuccess('', compact('categories','admins'));
	}
	
    public function store(Request $request)
    {
        $categories = Category::all();
        $admins = User::where('role_id', 1)->get();

        $request->validate([
            'title' => 'required|string|max:200',
            'status' => 'in:publish,draft',
            'category_id' => 'exists:categories,id',
            'seo_title' => 'requiredIf:searchable,1|max:200',
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
        $tags = $request->tags;
         if ($tags) {
             foreach ($tags as $tag) {
                 Tag::create([
                     'name' => $tag,
                     'blog_id' => $blog->id,
                 ]);
             }
         }

        return $this->sendSuccess('Blog is created successfully', compact('blog', 'admins', 'categories'), 201);
    }

    public function show(string $id)
    {
        try {
            // $casee=Casee::where('id',$id)->with('category','donationtype','user','item','caseimage')->first();
            $blog = Blog::where('id', $id)->with('tags')->get();
            return $this->sendSuccess('Blog Found', compact('blog'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Blog Not Found', [], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        $admins = User::where('role_id', 1)->get();
        $request->validate([
            'title' => 'required|string|max:200',
            'status' => 'in:publish,draft',
            'category_id' => 'exists:categories,id',
            'seo_title' => 'requiredIf:searchable,1|max:200',
            'seo_description' => 'requiredIf:searchable,1',
        ]);

        if ($request->file('image')) {
            $image = uploadImage($request->file('image'), 'blog-photos');
            $blog->update([
                'image' => $image
            ]);
        }
        if ($request->file('seo_image')) {
            $seo_image = uploadImage($request->file('seo_image'), 'blog-photos');
            $blog->update([
                'seo_image' => $seo_image
            ]);
        }

        if ($request->file('facebook_image')) {
            $facebook_image = uploadImage($request->file('facebook_image'), 'blog-photos');
            $blog->update([
                'facebook_image' => $facebook_image
            ]);
        }

        if ($request->file('twitter_image')) {
            $twitter_image = uploadImage($request->file('twitter_image'), 'blog-photos');
            $blog->update([
                'twitter_image' => $twitter_image
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
        $tags = $request->tags;
        $blogs_id = Blog::where('blog_id', $blog->id)->get();
        if ($tags) {
            foreach ($blogs_id as $id) {
                $id->delete();
            }
        }
        foreach ($tags as $tag) {
            Tag::create([
                'tag_name' => $tag->tag_name,
                'blog_id' => $blog->id,
            ]);
        }
        $blog->save();
        return $this->sendSuccess('Blog is updated successfully.', compact('blog', 'admins', 'categories'));
    }

    public function destroy(string $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return $this->sendSuccess('Blog deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Blog cann't deleted.", [], 404);
        }
    }
}