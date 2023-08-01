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
    { {
            $request->validate([
                'title' => 'required|string|max:200',
                'status' => 'in:publish,draft',
                'seo_title' => 'requiredIf:searchable,1|max:200',
                'seo_description' => 'requiredIf:searchable,1',
            ]);

            if ($request->file('avatar')) {
                $avatar = uploadImage($request->file('avatar'), 'event-photos');
            }
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


            $event = Event::create([
                'title' => $request->title,
                'content' => $request->get('content'),
                'searchable' => $request->searchable ?? 0,
                'status' => $request->status,
                'location' => $request->location,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'image' => $image ?? null,
                'avatar' => $avatar ?? null,
                'seo_title' => $request->seo_title,
                'seo_image' => $seo_image ?? null,
                'seo_description' => $request->seo_description,
                'facebook_title' => $request->facebook_title,
                'facebook_image' => $facebook_image ?? null,
                'facebook_description' => $request->facebook_description,
                'twitter_title' => $request->twitter_title,
                'twitter_image' => $twitter_image ?? null,
                'twitter_description' => $request->twitter_description,
            ]);
            return $this->sendSuccess('Event is created successfully', compact('event'), 201);
        }
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
        $event = Event::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:200',
            'status' => 'in:publish,draft',
            'category_id' => 'exists:categories,id',
            'seo_title' => 'requiredIf:searchable,1|max:200',
            'seo_description' => 'requiredIf:searchable,1',
        ]);

        if ($request->file('image')) {
            $image = uploadImage($request->file('image'), 'event-photos');
            $event->update([
                'image' => $image
            ]);
        }
        if ($request->file('avatar')) {
            $avatar = uploadImage($request->file('avatar'), 'event-photos');
            $event->update([
                'avatar' => $avatar
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
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'facebook_title' => $request->facebook_title,
            'facebook_description' => $request->facebook_description,
            'twitter_title' => $request->twitter_title,
            'twitter_description' => $request->twitter_description,
        ]);
        $event->save();
        return $this->sendSuccess('Event is updated successfully.', compact('event'));
    }

    public function destroy(string $id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->delete();
            return $this->sendSuccess('Event deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Event cann't deleted.", [], 404);
        }
    }
}