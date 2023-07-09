<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HousePolicyResource extends JsonResource
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

            'name' => $this->name,
            'description' => $this->description,
            'hotel_id' => $this->hotel_id,
            // 'banner' => $this->banner,
        ]
    }
}
