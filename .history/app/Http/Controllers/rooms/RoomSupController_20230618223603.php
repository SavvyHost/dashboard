<?php

namespace App\Http\Controllers\rooms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomSup;
// use App\Http\Resources\RoomAttributesResource;


class RoomSupController extends Controller
{




    public function show($id)
    {
        $attr = RoomSup::find($id);
        return view('rooms.rooms-sup-edit',compact('attr'));
    }
    public function index()
    {
        $att = RoomSup::all();
        return view('rooms.rooms-sup',compact('att'));
    }

    public function add()
    {
        // $attr = RoomSup::all();

        return view('rooms.rooms-sup-add',/* compact('attr') */);
    }










//
    // public function show($id)
    // {
        // $attr = RoomAttr::find($id);
        // return view('rooms.rooms-attr-edit',compact('attr'));
    // }
//
//
    // public function index()
    // {
        // $attrs = RoomAttr::all();
        // return view('rooms.rooms-attr', compact('attrs'));
    // }
//
//
//
//
    // public function index5()
    // {
        // $attr = RoomAttr::all();
        // return view('rooms.rooms-attr',compact('attr'));
    // }
    // public function add()
    // {
        // $attr = RoomAttr::all();
//
        // return view('rooms.rooms-attr-add');
    // }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $attr = RoomSup::create([
            'name'  =>  $request->name,
            'price'  =>  $request->price,
        ]);
        return redirect()->back()->with('success','Suppliement Added Successfully');

    }
    public function save_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $attr = RoomSup::find($id);
        $attr->name = $request->name;
        $attr->price = $request->price;
        $attr->save();

        return redirect()->back()->with('success','Suppliement Added Successfully');

    }





    public function destroy($id)
    {
        $attr = RoomSup::find($id);

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
            return response()->json(['error' => 'Suppliement not found'], 404);
        }

        $attr->delete();

        return response()->json(['message' => 'Suppliement deleted successfully'], 200);
    }






}
