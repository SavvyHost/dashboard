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
        $craeted= new ToursResource($tour);
        return response()->json(['data'=>$craeted,'error'=>''],200);
    }
}
