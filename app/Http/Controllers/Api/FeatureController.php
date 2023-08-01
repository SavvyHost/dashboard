<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FeatureController extends Controller
{
	use APITrait;
	
	public function index()
	{
		$features = FeatureResource::collection( Feature::with('subfeatures')->get() );
		
		return $this->sendSuccess('Features Found', compact('features'));
	}
	
	public function show( $id )
	{
		try {
			$feature = new FeatureResource( Feature::with('subfeatures')->findorFail($id) );
			return $this->sendSuccess('Feature Found', compact('feature'));
		} catch (ModelNotFoundException  $e) {
			return $this->sendError("Feature not Found", [], 404);
		}
	}
}

