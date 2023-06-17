<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources;

use Carbon\Carbon;

class RoomsResource extends JsonResource
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
            'banner' => $this->banner ? url('assets/hotel-photos/' . $this->banner) : null,
            // 'images' => $this->images,
            'images' => $this->formatImages(),

            'terms' => $this->terms,
            'description' => $this->description,
            'creation_date' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];



    }



    protected function formatImages()
{
    $images = [];
    $imagePaths = explode(',', $this->images);
    foreach ($imagePaths as $image) {
        $images[] = url('assets/hotel-photos/' . $image);
    }
    return $images;
}



}
