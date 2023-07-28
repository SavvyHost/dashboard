<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventController extends Controller
{
	use APITrait;
	
	public function index()
	{
		$events = EventResource::collection( Event::paginate(2) );
		return $this->sendSuccess('Events Found', compact('events'));
	}
	
	public function show($id)
	{
		try {
			$event = new EventResource( Event::find($id) );
			return $this->sendSuccess('Event Found', compact('event'));
		} catch (ModelNotFoundException $e) {
			return $this->sendError("Event not Found", [], 404);
		}
	}
}
