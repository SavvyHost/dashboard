<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
	use APITrait;
	
	public function index()
	{
		$events = Event::all();
		
		return $this->sendSuccess('Events Found', compact('events'));
	}
	
	public function show($id)
	{
		$event = Event::find($id);
		
		return $this->sendSuccess('Event Found', compact('event'));
	}
}
