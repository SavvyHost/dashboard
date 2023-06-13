<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelAttr;
use App\Http\Resources\HotelAttributesResource;


class AttributesController extends Controller
{








    public function show_api()
    {
        $attr =HotelAttributesResource::collection(HotelAttr::all());
        return response()->json(['data'=>$attr,'error'=>''],200);
    }


    public function save_api(Request $request)
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
