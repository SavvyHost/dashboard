<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10);

        return view('events.events-list', compact('events'));
    }

    public function create()
    {
        return view('events.add-event');
    }

    public function store(StoreEventRequest $request)
    {
        if ($request->file('image')) {
            $image = uploadImage($request->file('image'), 'event-photos');
        }
        if ($request->file('seo_image')) {
            $seo_image = uploadImage($request->file('seo_image'), 'event-photos');
        }
        if ($request->file('facebook_image')) {
            $facebook_image = uploadImage($request->file('facebook_image'), 'event-photos');
        }
        if ($request->file('twitter_image')) {
            $twitter_image = uploadImage($request->file('twitter_image'), 'event-photos');
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
        if ($request->file('image')) {
            $image = uploadImage($request->file('image'), 'event-photos');
            $event->update([
                'image' => $image
            ]);
        }
        if ($request->file('seo_image')) {
            $seo_image = uploadImage($request->file('seo_image'), 'event-photos');
            $event->update([
                'seo_image' => $seo_image
            ]);
        }
        if ($request->file('facebook_image')) {
            $facebook_image = uploadImage($request->file('facebook_image'), 'event-photos');
            $event->update([
                'facebook_image' => $facebook_image
            ]);
        }
        if ($request->file('twitter_image')) {
            $twitter_image = uploadImage($request->file('twitter_image'), 'event-photos');
            $event->update([
                'twitter_image' => $twitter_image
            ]);
        }
        $event->update([
            'title' => $request->title,
            'content' => $request->get('content'),
            'searchable' => $request->searchable,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'facebook_title' => $request->facebook_title,
            'facebook_description' => $request->facebook_description,
            'twitter_title' => $request->twitter_title,
            'twitter_description' => $request->twitter_description,
        ]);
        $event->save();
        return redirect()->route('event.edit', $event->id);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index');
    }
}
