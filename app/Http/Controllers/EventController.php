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
		if ($request->file('image')) {
			$image_path = $request->file('image')->store('api/blogs', 'public');
		} else {
			$image_path = null;
		}
		if ($request->file('seo_image')) {
			$image_path_seo = $request->file('seo_image')->store('api/seo_images', 'public');
		} else {
			$image_path_seo = null;
		}
		if ($request->file('facebook_image')) {
			$image_path_fb = $request->file('facebook_image')->store('api/facebook_images', 'public');
		} else {
			$image_path_fb = null;
		}
		if ($request->file('twitter_image')) {
			$image_path_tw = $request->file('twitter_image')->store('api/twitter_images', 'public');
		} else {
			$image_path_tw = null;
		}
		
		$event = new Event();
		
		$event->title = $request->get('title');
		$event->content = $request->get('content');
		$event->searchable = $request->get('searchable');
		$event->image = asset('storage/' . $image_path);
		$event->seo_title = $request->get('seo_title');
		$event->seo_image = asset('storage/' . $image_path_seo);
		$event->seo_description = $request->get('seo_description');
		$event->facebook_title = $request->get('facebook_title');
		$event->facebook_image = asset('storage/' . $image_path_fb);
		$event->facebook_description = $request->get('facebook_description');
		$event->twitter_title = $request->get('twitter_title');
		$event->twitter_image = asset('storage/' . $image_path_tw);
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
		if ($request->file('image')) {
			$image_path = $request->file('image')->store('api/blogs', 'public');
		} else {
			$image_path = null;
		}
		if ($request->file('seo_image')) {
			$image_path_seo = $request->file('seo_image')->store('api/seo_images', 'public');
		} else {
			$image_path_seo = null;
		}
		if ($request->file('facebook_image')) {
			$image_path_fb = $request->file('facebook_image')->store('api/facebook_images', 'public');
		} else {
			$image_path_fb = null;
		}
		if ($request->file('twitter_image')) {
			$image_path_tw = $request->file('twitter_image')->store('api/twitter_images', 'public');
		} else {
			$image_path_tw = null;
		}
		
		$event->title = $request->get('title');
		$event->content = $request->get('content');
		$event->searchable = $request->get('searchable');
		$event->image = asset('storage/' . $image_path);
		$event->seo_title = $request->get('seo_title');
		$event->seo_image = asset('storage/' . $image_path_seo);
		$event->seo_description = $request->get('seo_description');
		$event->facebook_title = $request->get('facebook_title');
		$event->facebook_image = asset('storage/' . $image_path_fb);
		$event->facebook_description = $request->get('facebook_description');
		$event->twitter_title = $request->get('twitter_title');
		$event->twitter_image = asset('storage/' . $image_path_tw);
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
