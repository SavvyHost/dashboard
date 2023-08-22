<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogController extends Controller
{
    use APITrait;

    public function index()
    {
        $blogs = BlogResource::collection(Blog::where('status', 'publish')->get());
        return $this->sendSuccess("Blogs Found", compact('blogs'));
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
}