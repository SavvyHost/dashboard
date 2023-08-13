<?php

namespace App\Http\Resources\Dashboard;

use App\Models\RoomDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'state' => $this->state,
            'hotel_name' => $this->hotel->name,
            'hotel_id' => $this->hotel->id,
            'room_details' => RoomDetailResource::collection( $this->room_details )
        ];
    }
}
