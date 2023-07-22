<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
		
		return view('events.events-list', compact('events'));
    }

    public function create()
    {
        return view('events.add-event');
    }

    public function store(StoreEventRequest $request)
    {
		$images = ['image',
			'seo_image',
			'facebook_image',
			'twitter_image'];
	
		foreach ( $images as $image ) {
			if ( $request->file($image) ) {
				$$image = uploadImage($request->file($image), 'event-photos');
			}
		}
		
		$event = new Event();
		
		$event->title = $request->get('title');
		$event->content = $request->get('content');
		$event->searchable = $request->get('searchable');
		$event->image = $image ?? null;
		$event->seo_title = $request->get('seo_title');
		$event->seo_image = $seo_image ?? null;
		$event->seo_description = $request->get('seo_description');
		$event->facebook_title = $request->get('facebook_title');
		$event->facebook_image = $facebook_image ?? null;
		$event->facebook_description = $request->get('facebook_description');
		$event->twitter_title = $request->get('twitter_title');
		$event->twitter_image = $twitter_image ?? null;
		$event->twitter_description = $request->get('twitter_description');
	
		$event->start_date = $request->get('start_date');
		$event->end_date = $request->get('end_date');
		$event->location = $request->get('location');
		
		$event->save();
		
		return redirect()->route('event.index');
    }

    public function show(Event $event)
    {
        //
    }

    public function edit(Event $event)
    {
        return view('events.edit-event', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
		$images = ['image',
			'seo_image',
			'facebook_image',
			'twitter_image'];
	
		foreach ( $images as $image ) {
			if ( $request->file($image) ) {
				$$image = uploadImage($request->file($image), 'event-photos');
			}
		}
	
		$event->title = $request->get('title');
		$event->content = $request->get('content');
		$event->searchable = $request->get('searchable');
		$event->image = $image ?? null;
		$event->seo_title = $request->get('seo_title');
		$event->seo_image = $seo_image ?? null;
		$event->seo_description = $request->get('seo_description');
		$event->facebook_title = $request->get('facebook_title');
		$event->facebook_image = $facebook_image ?? null;
		$event->facebook_description = $request->get('facebook_description');
		$event->twitter_title = $request->get('twitter_title');
		$event->twitter_image = $twitter_image ?? null;
		$event->twitter_description = $request->get('twitter_description');
	
		$event->start_date = $request->get('start_date');
		$event->end_date = $request->get('end_date');
		$event->location = $request->get('location');
	
		$event->save();
	
		return redirect()->route('event.index');
	
	}

    public function destroy(Event $event)
    {
        $event->delete();
	
		return redirect()->route('event.index');
	}
}
