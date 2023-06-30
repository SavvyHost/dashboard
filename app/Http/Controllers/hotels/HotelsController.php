<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Http\Resources\HotelsResource;



class HotelsController extends Controller
{



    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.hotels-list',compact('hotels'));
    }




    public function point($id)
    {
        $hotels = Hotel::find($id);
         // Check if the hotel exists
    if (!$hotels) {
        abort(404); // Or handle the case where the hotel is not found
    }
        return view('hotels.hotel-details',compact('hotels'));
    }




    public function destroy($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return redirect()->route('users.show')->with('error', 'hotel not found');
        }

        $hotel->delete();

        return redirect()->back()->with('success', 'hotel deleted successfully');
    }











    public function index_api()
    {
        $hotels =HotelsResource::collection( Hotel::all());

        return response()->json(['data'=>$hotels,'error'=>''],200);

    }





    public function delete_api($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);

        if (!$hotel) {
            return response()->json(['error' => 'hotel not found'], 404);
        }

        $hotel->delete();

        return response()->json(['message' => 'hotel deleted successfully'], 200);
    }





}

