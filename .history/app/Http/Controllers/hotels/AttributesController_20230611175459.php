<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelAttr;
use App\Http\Resources\HotelAttributesResource;


class AttributesController extends Controller
{
    public function index1()
    {
        $attr = HotelAttr::all();
        return view('hotels.hotels-attr',compact('attr'));
    }
    public function add1()
    {
        return view('hotels.hotels-attr-add');
    }
    public function save1(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = HotelAttr::create([
            'name'  =>  $request->name,
        ]);
        return redirect()->back()->with('success','Attribute Added Successfully');

    }
}
