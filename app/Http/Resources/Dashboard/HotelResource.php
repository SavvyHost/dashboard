<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'min_rate' => $this->min_rate,
            'max_rate' => $this->max_rate,
            'banner' => asset( $this->banner ) ,
            'category_code' => $this->category->code,
            'category' => $this->category->name,
            'zone_code' => $this->zone->code,
            'zone' => $this->zone->name,
            'currency_code' => $this->currency->code,
            'currency' => $this->currency->name,
            'supplier' => new SupplierResource( $this->supplier ),
            'images' => ImageResource::collection( $this->images )
        ];
    }
}
