<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::latest()->get();
		return view('categories.category-list', compact('categories'));
	}
	
	public function create()
	{
		return view('categories.category-add');
	}
	
	public function store( Request $request )
	{
		$request->validate(['name' => 'required',]);
		
		if ( $request->file('image') ) {
			$save_url = uploadImage($request->file('image'), 'category-photos');
		}
		Category::create(['name' => $request->name,
			'slug' => $request->slug,
			'image' => $save_url ?? null,]);
		
		return redirect()->route('category.index');
	}
	
	public function show( Category $category )
	{
		return view('categories.category-details', compact('category'));
	}
	
	public function edit( Category $category )
	{
		return view('categories.category-edit', compact('category'));
	}
	
	public function update( Request $request, Category $category )
	{
		if ( $request->file('image') ) {
			$image = uploadImage($request->file('image'), 'category-photos');
			$category->update(['image' => $image]);
		}
		
		$category->update(['name' => $request->name,
			'slug' => $request->slug,]);
		return redirect()->route('category.index');
	}
	
	public function destroy( Category $category )
	{
		$category->delete();
		return redirect()->route('category.index');
	}
}
