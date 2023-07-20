<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
	use APITrait;
	
	public function index()
	{
		$partners = Partner::all();
		
		return $this->sendSuccess('Partners Found', compact('partners'));
	}
	
	public function show( $id )
	{
		$partner = Partner::find($id);
		
		return $this->sendSuccess('Partner Found', compact('partner'));
	}
}

