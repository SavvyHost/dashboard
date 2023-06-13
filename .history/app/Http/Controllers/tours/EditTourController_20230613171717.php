<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourCategory;
use App\Http\Resources\ToursResource;




class EditTourController extends Controller
{
    public function show($tour_id)
    {
        $tour = Tour::find($tour_id);
        $categories = TourCategory::all();
        return view('tours.edit-tour',compact('tour','categories'));
    }

    public function save_api($tour_id , Request $request)
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

        $tour = Tour::find($tour_id);
        $tour->title    =   $request->title;
        $tour->category_id    =   $request->category;
        $tour->duration    =   $request->duration;
        $tour->location    =   $request->location;
        $tour->tour_date    =   $request->tour_date;
        $tour->min_people    =   $request->min_people;
        $tour->max_people    =   $request->max_people;
        $tour->longitude    =   $request->longitude;
        $tour->latitude    =   $request->latitude;
        $tour->price    =   $request->price;
        $tour->sale_price    =   $request->sale_price;
        $tour->save();
        $updated= new ToursResource($tour);
        return response()->json(['data'=>$updated,'error'=>''],200);

    }
}
