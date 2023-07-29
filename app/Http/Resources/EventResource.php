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
			'image' => asset( $this->image ),
			'avatar' => asset( $this->avatar ),
			'content' => $this->content,
			'start_date' => $this->start_date,
			'end_date' => $this->end_date,
			'location' => $this->location,
		];
    }
}
