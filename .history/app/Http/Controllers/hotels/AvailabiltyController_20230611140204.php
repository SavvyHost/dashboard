<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelExcep;


class AvailabiltyController extends Controller
{
    public function index()
    {
        // $hotels = Hotel::all();
        // return view('hotels.availabilty',compact('hotels'));
    }

    public function add()
    {
        $hotels = Hotel::all();
        return view('hotels.add-exception',compact('hotels'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'new_price' =>  'required',
        ]);
        $exception = HotelExcep::create([
            'hotel_id'  =>  $request->hotel_id,
            'start_date'    =>  $request->start_date,
            'end_date'  =>  $request->end_date,
            'new_price' =>  $request->new_price,
        ]);
        return redirect()->back()->with('success','Exception Added Successfully');
    }

    public function hotel_availabilty($hotel_id)
    {
        $hotel = Hotel::with('exceptions')->find($hotel_id);
        #$excep = $hotel->exceptions->toJson();
        return view ('hotels.hotel-availabilty',compact('hotel'));
    }

    public function edit($except_id)
    {
        $exceptions = HotelExcep::find($except_id);
        return view ('hotels.edit-exception',compact('exceptions'));
    }

    public function save_edit($except_id , Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'new_price' =>  'required',
        ]);
        $exceptions = HotelExcep::find($except_id);
        $exceptions->start_date = $request->start_date;
        $exceptions->end_date = $request->end_date;
        $exceptions->new_price = $request->new_price;
        $exceptions->save() ;
        return redirect()->back()->with('success','Exception Edited Successfully');

    }
}
