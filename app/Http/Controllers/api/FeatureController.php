<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Partner;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
	use APITrait;
	
	public function index()
	{
		$features = Feature::with('subfeatures')->get();
		
		return $this->sendSuccess('Features Found', compact('features'));
	}
	
	public function show( $id )
	{
		$feature = Feature::with('subfeatures')->find($id);
		
		return $this->sendSuccess('Feature Found', compact('feature'));
	}
}

