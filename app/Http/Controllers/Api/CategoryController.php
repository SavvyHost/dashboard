<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
		try {
			$category = Category::findorFail($id);
			return $this->sendSuccess('Category Found', compact('category'));
		} catch (ModelNotFoundException $e) {
			return $this->sendError('Category Not Found', [], 404);
		}
    }
}
