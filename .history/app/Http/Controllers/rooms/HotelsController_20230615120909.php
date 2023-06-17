<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoteRooml;
use App\Http\Resources\RoomsResource;



class RoomsController extends Controller
{



    public function index()
    {
        $rooms = Room::all();
        return view('hotels.hotels-list',compact('rooms'));
    }





    public function destroy($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return redirect()->route('users.show')->with('error', 'hotel not found');
        }

        $room->delete();

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

