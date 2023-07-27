<?php

namespace App\Http\Controllers\hotels;
use App\Models\HousePolicy;
use App\Models\Hotel;


use Illuminate\Http\Request;

class HousePolicyController extends Controller
{
    //
    public function show($id)
    {
        $attr = HousePolicy::find($id);
        return view('hotels.hotel-policy-edit',compact('attr'));
    }
    public function index()
    {
        $att = HousePolicy::all();
        return view('hotels.hotels-policy',compact('att'));
    }

    public function add()
    {
        // $attr = RoomType::all();

        return view('hotels.hotels-policy-add',/* compact('attr') */);
    }









    public function save(Request $request , $hotel_id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'hotel_id' => 'required',
        ]);
        $attr = RoomType::create([
            'name'  =>  $request->name,
            'description'  =>  $request->description,
            'hotel_id'  =>  $hotel_id,
        ]);
        return redirect()->back()->with('success','Policy Added Successfully');

    }
    public function save_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $pol = HousePolicy::find($id);
        $pol->name = $request->name;
        $pol->price = $request->description;
        $pol->save();

        return redirect()->back()->with('success','Policy Added Successfully');

    }





    public function destroy($id)
    {
        $attr = RoomType::find($id);

        if (!$attr) {
            return redirect()-back()->with('error', 'Attribute not found');
        }

        $attr->delete();

        return redirect()->back()->with('success', 'Attribute deleted successfully');
    }










    public function show_api()
    {
        $attr =RoomAttributesResource::collection(RoomAttr::all());
        return response()->json(['data'=>$attr,'error'=>''],200);
    }


    public function save_api(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = RoomAttr::create([
            'name'  =>  $request->name,
        ]);
        $craeted= new RoomAttributesResource($attr);
        return response()->json(['data'=>$craeted,'error'=>''],200);
    }





    public function update_api(Request $request , $attr_id)
    {
        $request->validate([
            'name' => 'required',
        ]);


        $attr = RoomAttr::find($attr_id);
        $attr->name    = $request->name;
        $attr->save();


        $updated= new RoomAttributesResource($attr);
        return response()->json(['data'=>$updated,'error'=>''],200);
    }




    public function delete_api($attr_id)
    {
        $attr = RoomAttr::find($attr_id);

        if (!$attr) {
            return response()->json(['error' => 'attributes not found'], 404);
        }

        $attr->delete();

        return response()->json(['message' => 'attributes deleted successfully'], 200);
    }


}
