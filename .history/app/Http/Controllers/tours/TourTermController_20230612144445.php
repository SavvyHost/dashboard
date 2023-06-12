<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourAttr;
use App\Models\TourTerm;


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
}
