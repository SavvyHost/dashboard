<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourCategory;
use App\Http\Resources\TourCategoryResource;


class TourCategoryController extends Controller
{
    public function index()
    {
        $categories =TourCategoryResource::collection( TourCategory::all());

        return response()->json(['data'=>$categories,'error'=>''],200);
    }

    // public function new()
    // {
    //     return view('tours.add-category');
    // }

    public function save_new(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $category = TourCategory::create([
            'name'  =>  $request->name,
            'created_at'    =>  date('Y-m-d'),
        ]);
        $craeted= new TourCategory($category);
        return response()->json(['data'=>$craeted,'error'=>''],200);        }

    public function edit($category_id)
    {
        $category = TourCategory::find($category_id);
        return view('tours.edit-category',compact('category'));
    }

    public function save_edit($category_id,Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $category = TourCategory::find($category_id);
        $category->name = $request->category_name ;
        $category->save();
        return redirect()->back()->with('success','Tour Category Edited Successfully');
    }
}
