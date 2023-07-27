<?php

namespace App\Http\Controllers\hotels;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HousePolicy;
use App\Models\CancellationPolicy;
use App\Models\Hotel;
use App\Http\Resources\HousePolicyResource;

class CancellationPolicyController extends Controller
{
    //


    public function show($id)
    {
        $attr = CancellationPolicy::find($id);
        return view('hotels.hotels-cancel-edit',compact('attr'));
    }
    public function index()
    {
        $att = CancellationPolicy::all();
        return view('hotels.hotels-cancel',compact('att'));
    }

    public function add()
    {
        // $attr = CancellationPolicy::all();

        return view('rooms.rooms-type-add',/* compact('attr') */);
    }









    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'Beds' => 'required',
        ]);
        $attr = CancellationPolicy::create([
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
        $attr = CancellationPolicy::find($id);
        $attr->name = $request->name;
        $attr->price = $request->price;
        $attr->Beds = $request->Beds;
        $attr->save();

        return redirect()->back()->with('success','Type Added Successfully');

    }





    public function destroy($id)
    {
        $attr = CancellationPolicy::find($id);

        if (!$attr) {
            return redirect()-back()->with('error', 'Attribute not found');
        }

        $attr->delete();

        return redirect()->back()->with('success', 'Attribute deleted successfully');
    }


}
