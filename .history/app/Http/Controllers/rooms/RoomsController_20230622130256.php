<?php

namespace App\Http\Controllers\rooms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Meal;
use App\Models\RoomType;
use App\Http\Resources\RoomsResource;



class RoomsController extends Controller
{



    public function index()
    {
        $rooms = Room::all();
        return view('rooms.rooms-list',compact('rooms'));
    }








public function details($id)
{
            $room = Room::with('meals','types')->find($id);
        if (!$room) {
            abort(404);


        }
        $meals = $room->meals;
        $types = $room->types; // Assign types to $types variable
            return view('rooms.room-details',compact('room','meals','types'));
    }




    public function details_api(Request $request, $id)
    {
        $room = Room::with('meals', 'types')->find($id);

        if (!$room) {
            return Response::json(['error' => 'Room not found'], 404);
        }

        $meals = $room->meals;
        $types = $room->types;

        return Response::json(['room' => $room, 'meals' => $meals, 'types' => $types], 200);
    }







    public function point($id)
    {
        $hotel = Hotel::with('rooms')->find($id);
        #dd($terms);



        return view('hotels.hotel-rooms',compact('hotel'));
    }




    public function destroy($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return redirect()->back()->with('error', 'room not found');
        }

        $room->delete();

        return redirect()->back()->with('success', 'room deleted successfully');
    }













    public function index_api()
    {
        $rooms =RoomsResource::collection( Room::all());

        return response()->json(['data'=>$rooms,'error'=>''],200);

    }





    public function delete_api($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['error' => 'room not found'], 404);
        }

        $room->delete();

        return response()->json(['message' => 'room deleted successfully'], 200);
    }





}

