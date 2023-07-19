<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
	public function index()
	{
		$partners = Partner::all();
		return view('partners.partners-list', compact('partners'));
	}
	
	public function create()
	{
		return view('partners.add-partner');
	}
	
	public function store( Request $request )
	{
		$partner = new Partner();
		
		$partner->name = $request->get('name');
		
		if ( $request->hasFile('image') ) {
			$image = $request->file('image');
			$filename = $image->store('public/images');
			$partner->image = $filename;
		}
		
		$partner->save();
		
		return redirect()->route('partner.index');
	}
	
	public function show( Partner $partner )
	{
		//
	}
	
	public function edit( Partner $partner )
	{
		return view('partners.edit-partner', compact('partner'));
	}
	
	public function update( Request $request, Partner $partner )
	{
		$partner->name = $request->get('name');
		
		if ( $request->hasFile('image') ) {
			$image = $request->file('image');
			$filename = $image->store('public/images');
			$partner->image = $filename;
		}
		
		$partner->save();
		
		return redirect()->route('partner.index');
	}
	
	public function destroy( Partner $partner )
	{
		$partner->delete();
		
		return redirect()->route('partner.index');
	}
}