<?php

namespace App\Http\Controllers;

use App\CMS\Sections\SectionFactory;
use App\Models\Page;
use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Template;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
		
		return view('pages.sections.sections-list', compact('sections'));
    }

    public function create()
    {
    
		
		return view('pages.sections.add-section');
    }


    public function store(StoreSectionRequest $request)
    {
        $section = new Section();
		
		$section->name = $request->get('name');
		$section->data = $request->get('data');
		
		$section->save();
		
		return redirect()->route('pages.section.index');
    }

    public function show(Section $section)
    {
        dd($section->body);
    }

    public function edit(Section $section)
    {
        $factory = new SectionFactory();
		$instance = $factory->getSection($section->name);
		$inputs = $instance->getInputs();
		$isIterable = $instance->isIterable();
		
//		dd($section->data);
//		dd($section->data['title']);
		return view('pages.sections.edit-section', compact('section' , 'inputs', 'isIterable'));
    }

    public function update(UpdateSectionRequest $request, Section $section)
    {
        $factory = new SectionFactory();
		$instance = $factory->getSection($section->name);
		$parameters = $instance->getParameters();

		if ( $instance->isIterable() ) {
			$data = [];
			
			$singleParameter = $parameters[0];
			$count = sizeof( $request->get($singleParameter) );
			for($i = 0; $i < $count; $i++) {
				$datum = [];
				foreach ( $parameters as $parameter ) {
					$datum[$parameter] = $request->get($parameter)[$i];
				}
				
				$data[] = $datum;
			}
		} else {
			$data = [];
			foreach ($parameters as $parameter) {
				$data[$parameter] = $request->get($parameter);
			}
		}
	
		$section->data = $data;
		
		$section->save();
		
		return redirect()->route('pages.section.index');
		
    }

    public function destroy(Section $section)
    {
        //
    }
}
