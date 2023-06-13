<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourCategory;
use App\Http\Resources\TourCategoryResource;


class TourCategoryController extends Controller
{
    public function index_api()
    {
        $categories =TourCategoryResource::collection( TourCategory::all());

        return response()->json(['data'=>$categories,'error'=>''],200);
    }


    public function save_new_api(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = TourCategory::create([
            'name'  =>  $request->name,
            'created_at'    =>  date('Y-m-d'),
        ]);
        $craeted= new TourCategoryResource($category);
        return response()->json(['data'=>$craeted,'error'=>''],200);        }

    public function edit($category_id)
    {
        $category = TourCategory::find($category_id);
        return view('tours.edit-category',compact('category'));
    }

    public function save_edit_api($category_id,Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = TourCategory::find($category_id);
        $category->name = $request->name ;
        $category->save();
        $updated= new TourCategoryResource($category);
        return response()->json(['data'=>$updated,'error'=>''],200);     }






        public function delete($category_id)
        {
            $category = TourCategory::find($category_id);

            if (!$category) {
                return response()->json(['error' => 'term not found'], 404);
            }

            $category->delete();

            return response()->json(['message' => 'term deleted successfully'], 200);
        }











    }
