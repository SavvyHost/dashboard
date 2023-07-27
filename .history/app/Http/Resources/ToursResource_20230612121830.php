<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ToursResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);


        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => new TourCategoryResource($this->category), // Assuming you have created a resource for TourCategory model
            'duration' => $this->duration,
            'location' => $this->location,
            'tour_date' => $this->tour_date,
            'min_people' => $this->min_people,
            'max_people' => $this->max_people,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude, // Corrected 'longtuide' to 'longitude'
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'created_at' => $this->created_at,
        ];





    }
}
