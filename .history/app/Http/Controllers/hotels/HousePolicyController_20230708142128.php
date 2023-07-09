<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HousePolicy;
use App\Models\Hotel;
use App\Http\Resources\HousePolicyResource;




class HousePolicyController extends Controller
{
    //


    public function index($hotel_id)
    {
        $attr = HousePolicy::with('policies')->find($hotel_id);
        #dd($terms);
        return view('hotels.hotel-terms',compact('attr'));
    }

    public function show($id)
    {
        $pol = HousePolicy::find($id);
        return view('hotels.hotel-policy-edit',compact('pol'));
    }
    // public function index()
    // {
    //     $pol = HousePolicy::all();
    //     return view('hotels.hotels-policy',compact('pol'));
    // }




    public function edit($id)
    {
        $pol = HousePolicy::find($id);
        return view('hotels.hotel-policy-edit',compact('pol'));
    }

    // public function add($hotel_id)
    // {
    //     // view()->share('hotel_id', $hotel_id);

    //     // view()->composer('hotels.add-hotel', function ($view) use ($hotel_id) {
    //     //     $view->with('hotel_id', $hotel_id);
    //     // });
    //     return view('hotels.hotel-policy-add',compact('hotel_id'));
    // }



    public function add($hotel_id)
{
    return view('hotels.add-hotel', ['hotel_id' => $hotel_id]);
}




    public function save(Request $request , $hotel_id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $pol = HousePolicy::create([
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
        $pol->description = $request->description;
        $pol->save();

        return redirect()->back()->with('success','Policy Added Successfully');

    }





    public function destroy($id)
    {
        $pol = HousePolicy::find($id);

        if (!$pol) {
            return redirect()-back()->with('error', 'Policy not found');
        }

        $pol->delete();

        return redirect()->back()->with('success', 'Policy deleted successfully');
    }










    public function show_api()
    {
        $attr =HousePolicyResource::collection(RoomAttr::all());
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
        $craeted= new HousePolicyResource($attr);
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


        $updated= new HousePolicyResource($attr);
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
