<?php

namespace App\Http\Controllers\rooms;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Http\Resources\MealResource;

use Illuminate\Http\Request;

class MealController extends Controller
{






    public function show($id)
    {
        $attr = meal::find($id);
        return view('rooms.rooms-meals-edit',compact('attr'));
    }
    public function index()
    {
        $att = meal::all();
        return view('rooms.rooms-meals',compact('att'));
    }

    public function add()
    {
        // $attr = meal::all();

        return view('rooms.rooms-meals-add',/* compact('attr') */);
    }









    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'description' => 'required',
        ]);
        $attr = meal::create([
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
        $attr = meal::find($id);
        $attr->name = $request->name;
        $attr->price = $request->price;
        $attr->Beds = $request->Beds;
        $attr->save();

        return redirect()->back()->with('success','Type Added Successfully');

    }





    public function destroy($id)
    {
        $attr = meal::find($id);

        if (!$attr) {
            return redirect()-back()->with('error', 'Attribute not found');
        }

        $attr->delete();

        return redirect()->back()->with('success', 'Attribute deleted successfully');
    }






}
