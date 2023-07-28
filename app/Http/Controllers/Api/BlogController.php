<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    use APITrait;

    public function index()
    {
        $blogs = BlogResource::collection(Blog::where('status', 'publish')->paginate(10));
        return $this->sendSuccess("Blogs Found", compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return $this->sendSuccess('Blog Found', compact('blog'));
    }
}
