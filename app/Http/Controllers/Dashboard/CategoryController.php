<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use function uploadImage;

class CategoryController extends Controller
{
    use APITrait;

    public function index()
    {
        $categories = Category::all();
        return $this->sendSuccess('All Categories.', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required',]);
        if ($request->file('image')) {
            $save_url = uploadImage($request->file('image'), 'category-photos');
            $category = Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'image' => asset($save_url) ?? null,
            ]);
        } else {
            $category = Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                // 'image' => asset($save_url) ?? null,
            ]);
        }


        return $this->sendSuccess('Category is created successfully', compact('category'), 201);
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
            $category->update(['image' => asset($image)]);
        }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return $this->sendSuccess('Category is updated successfully.', compact('category'));
    }

    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return $this->sendSuccess('Category deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Category cann't deleted.", [], 404);
        }
    }
}
