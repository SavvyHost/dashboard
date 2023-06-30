<?php

namespace App\Http\Controllers\hotels;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HousePolicy;
use App\Models\Hotel;
use App\Http\Resources\HousePolicyResource;

class CancellationPolicyController extends Controller
{
    //


    public function show($id)
    {
        $attr = RoomType::find($id);
        return view('rooms.rooms-type-edit',compact('attr'));
    }
    public function index()
    {
        $att = RoomType::all();
        return view('rooms.rooms-type',compact('att'));
    }

    public function add()
    {
        // $attr = RoomType::all();

        return view('rooms.rooms-type-add',/* compact('attr') */);
    }









    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'Beds' => 'required',
        ]);
        $attr = RoomType::create([
            'name'  =>  $request->name,
            'price'  =>  $request->price,
            'Beds'  =>  $request->Beds,
        ]);
        return redirect()->back()->with('success','Type Added Successfully');

    }
    public function save_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'Beds' => 'required',
        ]);
        $attr = RoomType::find($id);
        $attr->name = $request->name;
        $attr->price = $request->price;
        $attr->Beds = $request->Beds;
        $attr->save();

        return redirect()->back()->with('success','Type Added Successfully');

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


}
