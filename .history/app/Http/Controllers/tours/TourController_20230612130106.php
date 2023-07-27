<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Http\Resources\ToursResource;

class TourController extends Controller
{
    public function index()
    {
        // $tours = Tour::with('category')->get();
        // return view('tours.tours-list',compact('tours'));

            $tours =ToursResource::collection( Tour::all());

            return response()->json(['data'=>$tours,'error'=>''],200);


    }




    public function delete($hotel_id)
    {
        $tour = Tour::find($hotel_id);

        if (!$tour) {
            return response()->json(['error' => 'tour not found'], 404);
        }

        $tour->delete();

        return response()->json(['message' => 'tour deleted successfully'], 200);
    }









}
