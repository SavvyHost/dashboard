<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelAttr;
use App\Models\HotelTerm;


class TermsController extends Controller
{
    // public function index($attr_id)
    // {
    //     $attr = HotelAttr::with('terms')->find($attr_id);
    //     #dd($terms);
    //     return view('hotels.hotel-terms',compact('attr'));


    //     $attr =HotelAttributesResource::collection(HotelAttr::all());
    //     return response()->json(['data'=>$attr,'error'=>''],200);
    // }

    public function index()
    {
        $hotelTerms = HotelTerm::all();
        return TermsResource::collection($hotelTerms);
    }



    public function add($attr_id)
    {
        return view('hotels.hotel-terms-add',compact('attr_id'));
    }
    public function save($attr_id,Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $term = HotelTerm::create([
            'name'  =>  $request->name,
            'attr_id'   =>  $attr_id,
        ]);
        return redirect()->back()->with('success','Term Added Successfully');
    }
}
