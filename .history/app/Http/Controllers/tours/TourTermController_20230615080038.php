<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourAttr;
use App\Models\TourTerm;

use App\Http\Resources\TourTermsResource;


class TourTermController extends Controller
{




    public function index($attr_id)
    {
        $attr = TourAttr::with('terms')->find($attr_id);
        #dd($terms);
        return view('tours.tour-terms',compact('attr'));
    }
    public function add($attr_id)
    {
        return view('tours.tour-terms-add',compact('attr_id'));
    }
    public function save($attr_id,Request $request)
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





    public function show($id)
    {
        $term = TourTerm::find($id);
        return view('tours.tour-terms-edit',compact('term'));
    }


    public function save_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $term = TourTerm::find($id);
        $term->name = $request->name;
        $term->save();

        return redirect()->back()->with('success','Term updated Successfully');

    }


    public function destroy($term_id)
    {
        $term = TourTerm::find($term_id);

        if (!$term) {
            return redirect()->back()->with('error', 'term not found');
        }

        $term->delete();

        return redirect()->back()->with('success', 'term deleted successfully');
    }









    public function index_api()
    {
        $tourTerms = TourTerm::all();
        return TourTermsResource::collection($tourTerms);



    }

    public function show_api($attr_id)
    {
        $tourTerms = TourTerm::where('attr_id',$attr_id)->get();
        return TourTermsResource::collection($tourTerms);

    }








    public function save_api(Request $request)
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





    public function update_api($term_id , Request $request)
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





    public function delete_api($term_id)
    {
        $term = TourTerm::find($term_id);

        if (!$term) {
            return response()->json(['error' => 'term not found'], 404);
        }

        $term->delete();

        return response()->json(['message' => 'term deleted successfully'], 200);
    }

















}
