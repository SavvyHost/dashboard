<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelAttr;
use App\Http\Resources\HotelsResource;


class EditHotelController extends Controller
{
    public function show($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        $attrs = HotelAttr::all();
        return view('hotels.edit-hotel',compact('hotel','attrs'));
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
