<?php

namespace App\Http\Controllers\rooms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomAttr;
use App\Http\Resources\RoomsResource;


class EditRoomController extends Controller
{
    public function show($room_id)
    {
        $room = Room::find($room_id);
        $attrs = RoomAttr::all();
        $types = RoomType::get();

        return view('rooms.edit-room',compact('room','types','attrs'));
    }



    public function save_edit($room_id , Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'description' => 'required',
            'terms' => 'nullable|array',
            'terms.*' => 'nullable', // If terms is an array, each item is nullable
            'banner' => 'required',
        ]);

        $terms = '';
        $images = '';

        if ($request->has('terms')) {
            foreach ($request->terms as $term) {
                if ($terms != '') {
                    $terms = $terms . ',';
                }
                $terms = $terms . $term;
            }
        }

        foreach ($request->file('image') as $pic) {
            if ($images != '') {
                $images = $images . ',';
            }
            $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
            $images = $images . $image_name;
            $pic->move(public_path('assets/hotel-photos'), $image_name);
        }

        $banner = time() . rand(1, 100) . '.' . $request->file('banner')->getClientOriginalExtension();
        $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);
        $room = Room::find($room_id);
        $room->name    = $request->name;
        $room->price    = $request->price;
        $room->description = $request->description;
        $room->hotel_id = $hotel_id;

        $room->max_adult = $request->max_adult;
        $room->max_child = $request->max_child;
        $room->price = $request->price;
        $room->banner = $request->banner;
        $room->images = $request->images;
        $room->type = $request->type;
        $room->terms = $request->terms;



        if($request->image != null)
        {
            $room->images = $images;
        };
        $room->save();
        return redirect()->back()->with('success','Hotel Updated Successfully');

    }











    public function save_api($hotel_id , Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
            'location' => 'required',
            'description' => 'required|string|max:255',
            'image' => 'nullable',

        ]);
        $images = '';
        if($request->image != null)
        {
            foreach($request->file('image') as $pic)
            {
                if($images != '')
                {
                    $images = $images.',';
                }
                $image_name = time().rand(1,100).'.'.$pic->getClientOriginalExtension();
                $images = $images.$image_name;
                $pic->move(public_path('assets/hotel-photos'), $image_name);
            }
        }
        $hotel = Hotel::find($hotel_id);
        $hotel->name    = $request->name;
        $hotel->price    = $request->price;
        $hotel->location    = $request->location;
        $hotel->description = $request->description;
        if($request->image != null)
        {
            $hotel->images = $images;
        };
        $hotel->save();
        $updatedHotel = $hotel;

        return response()->json(['data' => $updatedHotel, 'error' => ''], 200);

    }

}
