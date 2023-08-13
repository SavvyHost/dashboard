<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomDetailResource extends JsonResource
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
            'net' => $this->net,
            'cancellation_policy' => $this->cancellation_policy,
            'room_id' => $this->room_id,
            'room_name' => $this->room->name,
            'hotel_id' => $this->hotel_id,
            'hotel_name' => $this->hotel->name,
            'supplier_id' => $this->supplier_id,
            'supplier_name' => $this->supplier->name,
            'rooms' => $this->rooms
        ];
    }
}
