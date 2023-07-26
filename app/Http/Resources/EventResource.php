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
			'title' => $this->title,
			'image' => $this->image,
			'content' => $this->content,
			'start_date' => $this->start_date,
			'end_date' => $this->end_date,
			'location' => $this->location,
		];
    }
}
