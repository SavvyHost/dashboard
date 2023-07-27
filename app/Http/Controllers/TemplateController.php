<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::all();
		return view('pages.templates.templates-list', compact('templates'));
    }

    public function create()
    {
        return view('pages.templates.add-template');
    }

    public function store(StoreTemplateRequest $request)
    {
        $template = new Template();
		
		$template->name = $request->get('name');
		$template->body = $request->get('body');
		$template->parameters = $request->get('parameters');
		
		$template->save();
		
		return redirect()->route('pages.template.index');
    }

    public function show(Template $template)
    {
        //
    }

    public function edit(Template $template)
    {
        //
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        //
    }

    public function destroy(Template $template)
    {
        //
    }
}
