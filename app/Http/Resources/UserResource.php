<?php

namespace App\Http\Resources;

use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'avatar' => asset($this->avatar),
            'country' => $this->country,
            'role_id' => $this->role_id,
            'bio' => $this->bio,
            'gender' => $this->gender ? "Male" : "Female",
            'status' => $this->status,
            'email' => $this->email,
            'username' => $this->username,
            'phone' => $this->phone,
        ];
    }
}
