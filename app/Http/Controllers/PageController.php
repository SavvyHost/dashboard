<?php

namespace App\Http\Controllers;

use App\CMS\Sections\SectionFactory;
use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function index()
	{
		$pages = Page::all();
		
		return view('pages.pages.pages-list', compact('pages'));
	}
	
	public function create()
	{
		return view('pages.pages.add-page');
	}
	
	public function store( StorePageRequest $request )
	{
		$page = new Page();
		
		$page->name = $request->get('name');
		$page->searchable = $request->get('searchable', false);
		
		$page->seo_title = $request->get('seo_title');
		$page->seo_description = $request->get('seo_description');
		
		$page->facebook_title = $request->get('facebook_title');
		$page->facebook_description = $request->get('facebook_description');
		
		$page->twitter_title = $request->get('twitter_title');
		$page->twitter_description = $request->get('twitter_description');
		
		$page->publish = $request->get('publish', false);
		$page->header_style = $request->get('header_style');
		
		// Upload and save the images
		if ( $request->hasFile('featured_image') ) {
			$page->featured_image = $request->file('featured_image')->store('public/images');
		}
		if ( $request->hasFile('facebook_image') ) {
			$page->facebook_image = $request->file('facebook_image')->store('public/images');
		}
		if ( $request->hasFile('twitter_image') ) {
			$page->twitter_image = $request->file('twitter_image')->store('public/images');
		}
		if ( $request->hasFile('logo') ) {
			$page->logo = $request->file('logo')->store('public/images');
		}
		
		$page->save();
		
		return redirect()->route('pages.page.index');
	}
	
	public function build( Page $page )
	{
		$sections = Section::all();
		
		return view('pages.pages.page-builder', compact('page', 'sections'));
	}
	
	public function rebuild( Request $request, Page $page )
	{
		$sections = $request->get('sections', []);
		
		$factory = new SectionFactory();
		$page->sections()->detach();
		
		foreach ( $sections as $section ) {
			$section = Section::find($section);
			$instance = $factory->getSection($section->name);
			$parameters = $instance->getParameters();
			
			$data = [];
			if ( $instance->isIterable() ) {
				$singleParameter = $parameters[0];
				$count = sizeof($request->get($section->name)[$singleParameter]);
				for ( $i = 0; $i < $count; $i++ ) {
					$datum = [];
					foreach ( $parameters as $parameter ) {
						$datum[$parameter] = $request->get($section->name)[$parameter][$i];
					}
					
					$data[] = $datum;
				}
			} else {
				foreach ( $parameters as $parameter ) {
					$data[$parameter] = $request->get($section->name)[$parameter];
				}
			}
			$page->sections()->attach($section->id, ['data' => $data]);
		}
		
		return redirect()->route('pages.page.index');
	}
	
	public function show( Page $page )
	{
		return view('pages.pages.show-page', compact('page'));
	}
	
	public function edit( Page $page )
	{
		return view('pages.pages.edit-page', compact('page'));
	}
	
	public function update( UpdatePageRequest $request, Page $page )
	{
		$page->name = $request->get('name');
		$page->searchable = $request->get('searchable', false);
		
		$page->seo_title = $request->get('seo_title');
		$page->seo_description = $request->get('seo_description');
		
		$page->facebook_title = $request->get('facebook_title');
		$page->facebook_description = $request->get('facebook_description');
		
		$page->twitter_title = $request->get('twitter_title');
		$page->twitter_description = $request->get('twitter_description');
		
		$page->publish = $request->get('publish', false);
		$page->header_style = $request->get('header_style');
		
		// Upload and save the images
		if ( $request->hasFile('featured_image') ) {
			$page->featured_image = $request->file('featured_image')->store('public/images');
		}
		if ( $request->hasFile('facebook_image') ) {
			$page->facebook_image = $request->file('facebook_image')->store('public/images');
		}
		if ( $request->hasFile('twitter_image') ) {
			$page->twitter_image = $request->file('twitter_image')->store('public/images');
		}
		if ( $request->hasFile('logo') ) {
			$page->logo = $request->file('logo')->store('public/images');
		}
		
		$page->save();
		
		return redirect()->route('pages.page.index');
	}
	
	public function destroy( Page $page )
	{
		$page->delete();
		return redirect()->route('pages.page.index');
	}
	
	public function page_api( $page )
	{
		$page = Page::where('name', '=', $page)->first();
		$sections = $page->sections;
		
		$sections = $sections->map(function ($section) {
			$section->data = $section->pivot->data;
			unset($section->pivot);
			return $section;
		});
		
		unset($page->sections);
		$factory = new SectionFactory();
//		$sections = [];

//		foreach ( $page->sections as $section ) {
//			$instance = $factory->getSection($section->name);
//
//			$s = ['name' => $instance->getName(),
//				'content' => $instance->getContent($section->pages()->first())];
//			$sections[] = $s;
//		}
		
		return response()->json([
			"message" => "Successfully Found",
			'page' => $page,
			'sections' => $sections
		]);
	}
}
