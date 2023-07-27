<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelAttr;
use App\Http\Resources\HotelAttributesResource;


class AttributesController extends Controller
{



    public function show($id)
    {
        $attr = HotelAttr::find($id);
        return view('hotels.hotels-attr-edit',compact('attr'));
    }
    public function index()
    {
        $attr = HotelAttr::all();
        return view('hotels.hotels-attr',compact('attr'));
    }
    public function add()
    {
        $attr = HotelAttr::all();

        return view('hotels.hotels-attr-add');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = HotelAttr::create([
            'name'  =>  $request->name,
        ]);
        return redirect()->back()->with('success','Attribute Added Successfully');

    }
    public function save_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = HotelAttr::find($id);
        $attr->name = $request->name;
        $attr->save();

        return redirect()->back()->with('success','Attribute Added Successfully');

    }





    public function destroy($id)
    {
        $attr = HotelAttr::find($id);

        if (!$attr) {
            return redirect()->back()->with('error', 'Attribute not found');
        }


        $attr->terms()->delete();


        $attr->delete();

        return redirect()->back()->with('success', 'Attribute deleted successfully');
    }










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





    public function update_api(Request $request , $attr_id)
    {
        $request->validate([
            'name' => 'required',
        ]);


        $attr = HotelAttr::find($attr_id);
        $attr->name    = $request->name;
        $attr->save();


        $updated= new HotelAttributesResource($attr);
        return response()->json(['data'=>$updated,'error'=>''],200);
    }




    public function delete_api($attr_id)
    {
        $attr = HotelAttr::find($attr_id);

        if (!$attr) {
            return response()->json(['error' => 'attributes not found'], 404);
        }

        $attr->delete();

        return response()->json(['message' => 'attributes deleted successfully'], 200);
    }






}
