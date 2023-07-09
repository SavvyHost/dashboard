<?php

namespace App\Http\Controllers\rooms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomAttr;
use App\Models\RoomTerm;
use App\Http\Resources\TermsResource;



class RoomTermsController extends Controller
{

    public function index($attr_id)
    {
        $attr = RoomAttr::with('terms')->find($attr_id);
        #dd($terms);
        return view('rooms.rooms-terms',compact('attr'));
    }
    // public function index($term_id)
    // {
    //     $terms = RoomAttr::with('terms')->find($term_id);
    //     #dd($terms);
    //     return view('hotels.hotel-terms',compact('terms'));
    // }
    public function add($attr_id)
    {
        return view('rooms.rooms-terms-add',compact('attr_id'));
    }
    public function save($attr_id,Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $term = RoomTerm::create([
            'name'  =>  $request->name,
            'price'  =>  $request->price,
            'attr_id'   =>  $attr_id,
        ]);
        return redirect()->back()->with('success','Term Added Successfully');
    }



    public function edit($id)
    {
        $terms = RoomTerm::find($id);
        return view ('rooms.rooms-terms-edit',compact('terms'));
    }






    public function save_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $term = RoomTerm::find($id);
        $term->name = $request->name;
        $term->price = $request->price;
        $term->save();

        return redirect()->back()->with('success','Term Updated Successfully');

    }


    public function destroy($id)
    {
        $term = RoomTerm::find($id);

        if (!$term) {
            return redirect()->route('users.show')->with('error', 'Exception not found');
        }

        $term->delete();

        return redirect()->back()->with('success', 'Exception deleted successfully');
    }






    public function index_api()
    {
        $hotelTerms = RoomTerm::all();
        return TermsResource::collection($hotelTerms);



    }

    public function show_api($attr_id)
    {
        $hotelTerms = RoomTerm::where('attr_id',$attr_id)->get();
        return TermsResource::collection($hotelTerms);

    }








    public function save_api(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $term = RoomTerm::create([
            'name'  =>  $request->name,
            'attr_id'   =>  $request->attr_id,
        ]);
        $craeted= new TermsResource($term);
        return response()->json(['data'=>$craeted,'error'=>''],200);
       }





    public function update_api($term_id , Request $request)
    {
        $request->validate([
            'name'  => '',
            'attr_id'   =>  '',
        ]);
        $term = RoomTerm::find($term_id);
        $term->name = $request->name;
        $term->attr_id = $request->attr_id;

        $term->save() ;
        $updated= new TermsResource($term);
        return response()->json(['data'=>$updated,'error'=>''],200);

    }





    public function delete_api($term_id)
    {
        $term = RoomTerm::find($term_id);

        if (!$term) {
            return response()->json(['error' => 'term not found'], 404);
        }

        $term->delete();

        return response()->json(['message' => 'term deleted successfully'], 200);
    }








}
