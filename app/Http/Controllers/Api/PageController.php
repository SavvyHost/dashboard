<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
	use APITrait;
	
    public function page( $page ) {
		$page = Page::where('name', $page)->with('sections')->first();
	
		if ($page) {
			return $this->sendSuccess('Page Found', compact('page'));
		} else {
			return $this->sendError('Page not Found', [], 404);
		}
	}
	
	public function page_by_data(Request $request ) {
		$page = $request->get('data');
		
		$page = Page::where('name', $page)->with('sections')->first();
		
		if ($page) {
			return $this->sendSuccess('Page Found', compact('page'));
		} else {
			return $this->sendError('Page not Found', [], 404);
		}
	}
}
