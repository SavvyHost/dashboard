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
        $response = [
            'message' => 'specific Category with id',
            'Category' => $category
        ];
        return response($response, 201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'slug' => 'string',
        ]);
        if ($request->file('image')) {
            $image_path = $request->file('image')->store('api/categories', 'public');
        } else {
            $image_path = null;
        }

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => asset('storage/' . $image_path),
            'created_at' => Carbon::new(),
        ]);

        $response = [
            'message' => 'Category created successfully',
            'Category' => $category
        ];
        return response($response, 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => 'required|string|max:200',
            'slug' => 'string',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'updated_at' => Carbon::new(),
        ]);
        if ($request->file('image')) {
            $image_path = $request->file('image')->store('api/categories', 'public');
            $category->image = asset('storage/' . $image_path);
            $category->save();
        }
        $response = [
            'message' => 'Category updated successfully',
            'Category' => $category
        ];
        return response($response, 201);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $response = [
            'message' => 'Category deleted successfully',
        ];
        return response($response, 201);
    }
}
