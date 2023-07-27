<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelAttr;
use App\Models\HotelTerm;
use App\Http\Resources\TermsResource;



class TermsController extends Controller
{
    public function index()
    {
        $hotelTerms = HotelTerm::all();
        return TermsResource::collection($hotelTerms);



    }

    public function show($attr_id)
    {
        $hotelTerms = HotelTerm::where('attr_id',$attr_id)->get();
        return TermsResource::collection($hotelTerms);

    }



    // public function save(Request $request, $hotel_id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'attr_id' => 'required',

    //     ]);

    //     $exception = HotelExcep::where('hotel_id', $hotel_id)->get();

    //     if ($exception) {

    //         $exception = HotelExcep::create([
    //             'hotel_id' => $hotel_id,
    //             'start_date' => $request->start_date,
    //             'end_date' => $request->end_date,
    //             'new_price' => $request->new_price,
    //         ]);
    //     }
    //     $craeted= new ExceptionsResource($exception);
    //     return response()->json(['data'=>$craeted,'error'=>''],200);
    // }




    public function save($attr_id,Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $term = HotelTerm::create([
            'name'  =>  $request->name,
            'attr_id'   =>  $request->$attr_id,
        ]);
        return redirect()->back()->with('success','Term Added Successfully');
    }
}
