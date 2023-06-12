<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelAttr;
use App\Http\Resources\HotelAttributesResource;


class AttributesController extends Controller
{
    public function index()
    {
        $attr = HotelAttr::all();
        return view('hotels.hotels-attr',compact('attr'));
    }
    public function add()
    {
        return view('hotels.hotels-attr-add');
    }
    public function save2(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = HotelAttr::create([
            'name'  =>  $request->name,
        ]);
        return redirect()->back()->with('success','Attribute Added Successfully');

    }






    public function show()
    {
        $attr =HotelAttributesResource::collection(HotelAttr::all());
        return response()->json(['data'=>$attr,'error'=>''],200);
    }

    // public function add()
    // {
    //     return view('users.add-subscriber');
    // }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = HotelAttr::create([
            'name'  =>  $request->name,
        ]);
        $craeted= new HotelAttributesResource($attr);
        return response()->json(['data'=>$craeted,'error'=>''],200);
    }





    public function update(Request $request , $subscriber_id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = HotelAttr::update([
            'name'  =>  $request->name,
        ]);
        $craeted= new HotelAttributesResource($attr);
        return response()->json(['data'=>$craeted,'error'=>''],200);
    }




    public function delete($subscriber_id)
    {
        $subscriber = Subscriber::find($subscriber_id);

        if (!$subscriber) {
            return response()->json(['error' => 'subscriber not found'], 404);
        }

        $subscriber->delete();

        return response()->json(['message' => 'subscriber deleted successfully'], 200);
    }






}
