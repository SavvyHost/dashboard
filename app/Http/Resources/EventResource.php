<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //        return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => asset($this->image),
            'avatar' => asset($this->avatar),
            'content' => $this->content,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'location' => $this->location,
            'searchable' => $this->searchable,
            'seo_title' => $this->seo_title,
            'seo_image' => asset($this->seo_image),
            'seo_description' => $this->seo_description,
            'facebook_title' => $this->facebook_title,
            'facebook_image' => asset($this->facebook_image),
            'facebook_description' => $this->facebook_description,
            'twitter_title' => $this->twitter_title,
            'twitter_image' => asset($this->twitter_image),
            'twitter_description' => $this->twitter_description,
            'domains' => $this->eventDomains,
            // 'Domains of Event' => $this->eventDomains()->pluck('event_domain_id', 'name'),
        ];
    }
}
