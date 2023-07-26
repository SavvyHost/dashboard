<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
		
		return view('features.features-list', compact('features'));
    }

    public function create()
    {
        return view('features.add-feature');
    }

    public function store(StoreFeatureRequest $request)
    {
		$icon = uploadImage($request->file('icon'), 'feature-photos');
		
		$feature = new Feature();
	
		$feature->name = $request->get('name');
		$feature->description = $request->get('description');
		$feature->icon = $icon;
		
		$feature->save();
		
		return redirect()->route('feature.index');
    }

    public function show(Feature $feature)
    {
        //
    }

    public function edit(Feature $feature)
    {
        return view('features.edit-feature', compact('feature'));
    }

    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
		$feature->name = $request->get('name');
		$feature->description = $request->get('description');
		
		if($request->file('icon')) {
			$icon = uploadImage($request->file('icon'), 'feature-photos');
			$feature->icon = $icon;
		}
	
		$feature->save();
	
		return redirect()->route('feature.index');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
	
		return redirect()->route('feature.index');
	
	}
}
