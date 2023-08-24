<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\EventDomain;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class EventDomainController extends Controller
{
    use APITrait;
    public function index()
    {
        try {
            $domains = EventDomain::all();
            return $this->sendSuccess('Domains Found', compact('domains'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Domain Not Found.", [], 404);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
        ]);
        $domain = EventDomain::create([
            'name' => $request->name,
        ]);
        return $this->sendSuccess('Domain is created successfully', compact('domain'), 201);
    }


    public function show(string $id)
    {
        try {
            $domain = EventDomain::findorFail($id);
            return $this->sendSuccess('Domain Found', compact('domain'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Domain not Found", [], 404);
        }
    }

    public function edit(EventDomain $eventDomain)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        try {
            $domain = EventDomain::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:200',
            ]);

            $domain->update([
                'name' => $request->name,
            ]);
            $domain->save();
            return $this->sendSuccess('Domain is updated successfully.', compact('domain'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Domain cann't updated this domain isn't exist.", [], 404);
        }
    }

    public function destroy(string $id)
    {
        try {
            $domain = EventDomain::findOrFail($id);
            $domain->delete();
            return $this->sendSuccess('Domain deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Domain cann't deleted.", [], 404);
        }
    }
}
