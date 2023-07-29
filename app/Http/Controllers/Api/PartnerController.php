<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use App\Models\Partner;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PartnerController extends Controller
{
	use APITrait;
	
	public function index()
	{
		$partners = PartnerResource::collection( Partner::all() );
		
		return $this->sendSuccess('Partners Found', compact('partners'));
	}
	
	public function show($id)
	{
		try{
			$partner = Partner::findorFail($id);
			
			return $this->sendSuccess('Partner Found', compact('partner'));
		} catch (ModelNotFoundException) {
			return $this->sendSuccess('Partner Not Found', [], 404);
		}
	}
}