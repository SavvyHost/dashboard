<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourCategory;
use App\Models\TourAttr;
use App\Http\Resources\ToursResource;




class AddTourController extends Controller
{



    public function index()
    {
        $attrs = TourAttr::with('terms')->get();
        $categories = TourCategory::all();
        return view('tours.add-tour',compact('categories','attrs'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'tour_title' => 'required',
            'category'  =>  'required',
            'tour_location' =>  'required',
            'tour_duration' =>  'required',
            'tour_price'    =>  'required',
            'tour_sale_price'   =>  'nullable',
            'tour_date' =>  'required',
            'terms' =>  'nullable',
            'banner'    =>  'required',
        ]);
        $tour = Tour::create([
            'title' =>  $request->tour_title,
            'category_id'   =>  $request->category,
            'duration'  =>  $request->tour_duration,
            'min_people'    =>  $request->min_people,
            'max_people'    =>  $request->max_people,
            'location'  =>  $request->tour_location,
            'price' =>  $request->tour_price,
            'sale_price'    =>  $request->tour_sale_price,
            'tour_date' =>  $request->tour_date,
            'created_at'    =>  date('Y-m-d'),
        ]);
        return redirect()->back()->with('success','Tour Added Successfully');

    }


















    public function save_api(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|exists:tour_category,id',
            'duration' => 'required',
            'location' => 'required',
            'tour_date' => 'required|date',
            'min_people' => 'required',
            'max_people' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'price' => 'required',
            'sale_price' => 'nullable',
        ]);
        $tour = Tour::create([
            'title' =>  $request->title,
            'category_id'   =>  $request->category,
            'location'  =>  $request->location,
            'duration'  =>  $request->duration,
            'min_people'    =>  $request->min_people,
            'max_people'    =>  $request->max_people,
            'price' =>  $request->price,
            'sale_price'    =>  $request->sale_price,
            'tour_date' =>  $request->tour_date,
            'longitude' =>  $request->longitude,
            'latitude' =>  $request->latitude,
            'created_at'    =>  date('Y-m-d'),
        ]);
        $craeted= new ToursResource($tour);
        return response()->json(['data'=>$craeted,'error'=>''],200);
    }
}
