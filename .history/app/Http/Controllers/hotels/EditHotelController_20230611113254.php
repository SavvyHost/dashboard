<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelAttr;


class EditHotelController extends Controller
{
    public function show($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        $attrs = HotelAttr::all();
        return view('hotels.edit-hotel',compact('hotel','attrs'));
    }

    public function save($hotel_id , Request $request)
    {
        $request->validate([
            'hotel_name' => 'required|string|max:255',
            'hotel_price' => 'required',
            'hotel_location' => 'required',
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
        $hotel->name    = $request->hotel_name;
        $hotel->price    = $request->hotel_price;
        $hotel->location    = $request->hotel_location;
        $hotel->description = $request->description;
        if($request->image != null)
        {
            $hotel->images = $images;
        };
        $hotel->save();
        return redirect()->back()->with('success','Hotel Updated Successfully');

    }

}
