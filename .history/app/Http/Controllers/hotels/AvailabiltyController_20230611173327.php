<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelExcep;
use App\Http\Resources\ExceptionsResource;
use App\Http\Resources\HotelsResource;




class AvailabiltyController extends Controller
{
    public function exceptions($hotel_id)
    {
        $exceptions = HotelExcep::with('hotel')->where('hotel_id', $hotel_id)->get();

        return ExceptionsResource::collection($exceptions);
    }

    public function add()
    {
        $hotels = Hotel::all();
        return view('hotels.add-exception',compact('hotels'));
    }

    public function save(Request $request, $hotel_id)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'new_price' => 'required',
        ]);

        $exception = HotelExcep::where('hotel_id', $hotel_id)->get();

        if ($exception) {

            $exception = HotelExcep::create([
                'hotel_id' => $hotel_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'new_price' => $request->new_price,
            ]);
        }
        $craeted= new ExceptionsResource($exception);
        return response()->json(['data'=>$craeted,'error'=>''],200);
    }




    public function hotel_availabilty($hotel_id)
    {
        $hotel = Hotel::with('exceptions')->find($hotel_id);
        #$excep = $hotel->exceptions->toJson();
        return view ('hotels.hotel-availabilty',compact('hotel'));
    }


    public function hotelAvailability($hotel_id)
{
    $hotel = Hotel::with('exceptions')->find($hotel_id);
    return new HotelsResource($hotel);
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
        $updated= new ExceptionsResource($exceptions);
        return response()->json(['data'=>$updated,'error'=>''],200);

    }
}
