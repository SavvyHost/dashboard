<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\APITrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    use APITrait;

    public function index()
    {
        $categories = Category::all();

        $response = [
            'message' => 'All Categories',
            'Categories' => $categories,
            'count' => count($categories)
        ];
        return response($response, 201);
        // return $this->sendSuccess('Categories Found', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required',]);

        if ($request->file('image')) {
            $save_url = uploadImage($request->file('image'), 'category-photos');
        }
        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $save_url ?? null,
        ]);
        $response = [
            'message' => 'Category created successfully',
            'Category' => $category
        ];
        return response($response, 201);
        // return $this->sendSuccess('Category is created successfully', compact('category'));
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

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $request->validate(['name' => 'required',]);

        if ($request->file('image')) {
            $image = uploadImage($request->file('image'), 'category-photos');
            $category->update(['image' => $image]);
        }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        $response = [
            'message' => 'Category updated successfully',
            'Category' => $category
        ];
        return response($response, 201);
        // return $this->sendSuccess('Category is updated successfully.', compact('category'));
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $response = [
            'message' => 'Category deleted successfully',
        ];
        return response($response, 201);
    }
}
