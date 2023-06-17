<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourAttr;

use App\Http\Resources\TourAttributesResource;
use App\Http\Resources\TourTermsResource;


class TourAttrController extends Controller
{


    public function index()
    {
        $attr = TourAttr::all();
        return view('tours.tour-attr',compact('attr'));
    }
    public function add()
    {
        return view('tours.tour-attr-add');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = TourAttr::create([
            'name'  =>  $request->name,
        ]);
        return redirect()->back()->with('success','Attribute Added Successfully');

    }




    public function show($id)
    {
        $attr = TourAttr::find($id);
        return view('tours.tour-attr-edit',compact('attr'));
    }


    public function save_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = TourAttr::find($id);
        $attr->name = $request->name;
        $attr->save();

        return redirect()->back()->with('success','Attribute Added Successfully');

    }





    public function show_api()
    {
        $attr =TourAttributesResource::collection(TourAttr::all());
        return response()->json(['data'=>$attr,'error'=>''],200);
    }



    public function save_api(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $attr = TourAttr::create([
            'name'  =>  $request->name,
        ]);
        $craeted= new TourAttributesResource($attr);
        return response()->json(['data'=>$craeted,'error'=>''],200);
    }





    public function update_api(Request $request , $attr_id)
    {
        $request->validate([
            'name' => 'required',
        ]);



        $attr = TourAttr::find($attr_id);
        $attr->name    = $request->name;
        $attr->save();


        $updated= new TourAttributesResource($attr);
        return response()->json(['data'=>$updated,'error'=>''],200);
    }




    public function delete_api($attr_id)
    {
        $attr = TourAttr::find($attr_id);

        if (!$attr) {
            return response()->json(['error' => 'attributes not found'], 404);
        }

        $attr->delete();

        return response()->json(['message' => 'attributes deleted successfully'], 200);
    }







}
