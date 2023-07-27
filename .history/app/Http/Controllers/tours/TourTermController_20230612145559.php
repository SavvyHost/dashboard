<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourAttr;
use App\Models\TourTerm;

use App\Http\Resources\TourTermsResource;


class TourTermController extends Controller
{
    public function index1($attr_id)
    {
        $attr = TourAttr::with('terms')->find($attr_id);
        #dd($terms);
        return view('tours.tour-terms',compact('attr'));
    }
    public function add1($attr_id)
    {
        return view('tours.tour-terms-add',compact('attr_id'));
    }
    public function save1($attr_id,Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $term = TourTerm::create([
            'name'  =>  $request->name,
            'attr_id'   =>  $attr_id,
        ]);
        return redirect()->back()->with('success','Term Added Successfully');
    }




    public function index()
    {
        $tourTerms = TourTerm::all();
        return TourTermsResource::collection($tourTerms);



    }

    public function show($attr_id)
    {
        $tourTerms = TourTerm::where('attr_id',$attr_id)->get();
        return TourTermsResource::collection($tourTerms);

    }








    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tourTerms = TourTerm::create([
            'name'  =>  $request->name,
            'attr_id'   =>  $request->attr_id,
        ]);
        $craeted= new TourTermsResource($tourTerms);
        return response()->json(['data'=>$craeted,'error'=>''],200);
       }





    public function update($term_id , Request $request)
    {
        $request->validate([
            'name'  => '',
            'attr_id'   =>  '',
        ]);
        $term = TourTerm::find($term_id);
        $term->name = $request->name;
        $term->attr_id = $request->attr_id;

        $term->save() ;
        $updated= new TourTermsResource($term);
        return response()->json(['data'=>$updated,'error'=>''],200);

    }





    public function delete($term_id)
    {
        $term = HotelTerm::find($term_id);

        if (!$term) {
            return response()->json(['error' => 'term not found'], 404);
        }

        $term->delete();

        return response()->json(['message' => 'term deleted successfully'], 200);
    }

















}
