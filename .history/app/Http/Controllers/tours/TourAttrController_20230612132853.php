<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourAttr;

use App\Http\Resources\TourAttributesResource;


class TourAttrController extends Controller
{
    // public function index()
    // {
    //     $attr = TourAttr::all();
    //     return view('tours.tour-attr',compact('attr'));
    // }
    // public function add()
    // {
    //     return view('tours.tour-attr-add');
    // }
    // public function save(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //     ]);
    //     $attr = TourAttr::create([
    //         'name'  =>  $request->name,
    //     ]);
    //     return redirect()->back()->with('success','Attribute Added Successfully');

    // }




    public function show()
    {
        $attr =HotelAttributesResource::collection(HotelAttr::all());
        return response()->json(['data'=>$attr,'error'=>''],200);
    }



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





    public function update(Request $request , $attr_id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        // $attr = HotelAttr::update([
        //     'name'  =>  $request->name,
        // ]);


        $attr = HotelAttr::find($attr_id);
        $attr->name    = $request->name;
        $attr->save();


        $updated= new HotelAttributesResource($attr);
        return response()->json(['data'=>$updated,'error'=>''],200);
    }




    public function delete($attr_id)
    {
        $attr = HotelAttr::find($attr_id);

        if (!$attr) {
            return response()->json(['error' => 'attributes not found'], 404);
        }

        $attr->delete();

        return response()->json(['message' => 'attributes deleted successfully'], 200);
    }







}
