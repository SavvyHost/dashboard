<?php

namespace App\Http\Resources;

use App\Http\Resources\Dashboard\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MainPageHotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'provider' => "local",
            'code' => $this->id,
            'name' => $this->name,
            'star_rates' => $this->hotel_category->name,
            'location' ,
            'min_rate' => $this->min_rate,
            'facilities',
            'images' => ImageResource::collection( $this->hotel_images ),
        ];
    }
}
