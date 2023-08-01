<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\APITrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class DashboardEventController extends Controller
{
    use APITrait;
    public function index()
    {
        $events = Event::all();
        return $this->sendSuccess('Events Found', compact('events'));
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
        try {
            $event = Event::findorFail($id);
            return $this->sendSuccess('Event Found', compact('event'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Event not Found", [], 404);
        }
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
