<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelAttr;
use App\Models\HotelTerm;
use App\Http\Resources\TermsResource;



class TermsController extends Controller
{
    public function index()
    {
        $hotelTerms = HotelTerm::all();
        return TermsResource::collection($hotelTerms);



    }

    public function show_api($attr_id)
    {
        $hotelTerms = HotelTerm::where('attr_id',$attr_id)->get();
        return TermsResource::collection($hotelTerms);

    }








    public function save_api(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $term = HotelTerm::create([
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
        $term = HotelTerm::find($term_id);
        $term->name = $request->name;
        $term->attr_id = $request->attr_id;

        $term->save() ;
        $updated= new TermsResource($term);
        return response()->json(['data'=>$updated,'error'=>''],200);

    }





    public function delete_api($term_id)
    {
        $term = HotelTerm::find($term_id);

        if (!$term) {
            return response()->json(['error' => 'term not found'], 404);
        }

        $term->delete();

        return response()->json(['message' => 'term deleted successfully'], 200);
    }








}
