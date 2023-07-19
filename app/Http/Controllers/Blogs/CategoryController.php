<?php

namespace App\Http\Controllers\Blogs;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $image = $request->file('image');
        if ($request->image) {
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->save('assets/category-photos/' . $image_name);
            $save_url = 'assets/category-photos/' . $image_name;

            Category::insert([
                'name'  =>  $request->name,
                'slug'  =>  $request->slug,
                'image'    =>  $save_url,
                // 'creation_date' =>  date('Y-m-d'),
                'created_at' => Carbon::now(),

            ]);
        } else {
            Category::insert([
                'name'  =>  $request->name,
                'slug'  =>  $request->slug,
                // 'creation_date' =>  date('Y-m-d'),
                'created_at' => Carbon::now(),

            ]);
        }
        return redirect()->route('all.category');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.category-details', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.category-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        // $category_id = $request->id;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->save('assets/category-photos/' . $image_name);
            $save_url = 'assets/category-photos/' . $image_name;

            Category::findOrFail($id)->update([
                'name'  =>  $request->name,
                'slug'  =>  $request->slug,
                'image'    =>  $save_url,
                // 'updated_at' => Carbon::new(),
            ]);
            return redirect()->route('all.category');
        } else {

            Category::findOrFail($id)->update([
                'name'  =>  $request->name,
                'slug'  =>  $request->slug,
                // 'updated_at' => Carbon::new(),

            ]);

            return redirect()->route('all.category');
        }
    }


    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }
}
