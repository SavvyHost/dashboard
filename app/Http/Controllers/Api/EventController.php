<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;

class EventController extends Controller
{
	use APITrait;
	
	public function index()
	{
		$events = EventResource::collection( Event::all() );
		return $this->sendSuccess('Events Found', compact('events'));
	}
	
	public function show($id)
	{
		$event = Event::find($id);
		
		return $this->sendSuccess('Event Found', compact('event'));
	}
}
