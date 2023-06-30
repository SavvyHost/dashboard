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
        $attr = Meal::create([
            'name'  =>  $request->name,
            'description'  =>  $request->description,

        ]);
        return redirect()->back()->with('success','Meal Added Successfully');

    }
    public function save_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ]);
        $attr = Meal::find($id);
        $attr->name = $request->name;
        $attr->description = $request->description;

        $attr->save();

        return redirect()->back()->with('success','Meal Added Successfully');

    }





    public function destroy($id)
    {
        $attr = Meal::find($id);

        if (!$attr) {
            return redirect()-back()->with('error', 'Meal not found');
        }

        $attr->delete();

        return redirect()->back()->with('success', 'Meal deleted successfully');
    }






}
