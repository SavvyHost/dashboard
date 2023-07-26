<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	use APITrait;
	
    public function index()
    {
        $categories = Category::all();
		
		return $this->sendSuccess('Categories Found', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
		return $this->sendSuccess('Category Found', compact('category'));
    }
}
