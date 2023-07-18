<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Subfeature;
use App\Http\Requests\StoreSubfeatureRequest;
use App\Http\Requests\UpdateSubfeatureRequest;

class SubfeatureController extends Controller
{
	public function index()
	{
		$subfeatures = Subfeature::all();
		return view('subfeatures.subfeatures-list', compact('subfeatures'));
	}
	
	public function create()
	{
		$features = Feature::all();
		return view('subfeatures.add-subfeature', compact('features'));
	}
	
	public function store( StoreSubfeatureRequest $request )
	{
		$subfeature = new Subfeature();
		
		$subfeature->name = $request->get('name');
		$subfeature->description = $request->get('description');
		$subfeature->icon = $request->get('icon');
		$subfeature->feature_id = $request->get('feature_id');
		
		$subfeature->save();
		
		return redirect()->route('subfeature.index');
	}
	
	public function show( Subfeature $subfeature )
	{
		//
	}
	
	public function edit( Subfeature $subfeature )
	{
		$features = Feature::all();
		return view('subfeatures.edit-subfeature', compact('features', 'subfeature'));
	}
	
	public function update( UpdateSubfeatureRequest $request, Subfeature $subfeature )
	{
		$subfeature->name = $request->get('name');
		$subfeature->description = $request->get('description');
		$subfeature->icon = $request->get('icon');
		$subfeature->feature_id = $request->get('feature_id');
		
		$subfeature->save();
		
		return redirect()->route('subfeature.index');
	}
	
	public function destroy( Subfeature $subfeature )
	{
		$subfeature->delete();
		
		return redirect()->route('subfeature.index');
	}
}