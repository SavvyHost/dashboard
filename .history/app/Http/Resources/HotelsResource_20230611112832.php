<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources;

use Carbon\Carbon;

class HotelsResource extends JsonResource
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
            'price' => $this->price,
            'location' => $this->location,
            // 'banner' => $this->banner,
            'banner' => assets($this->banner),
            'images' => $this->images,
            'terms' => $this->terms,
            'description' => $this->description,
            'creation_date' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];



    }
}
