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
        // return parent::toArray($request);


        $country = Country::findorFail($this->country_id);
        if ($this->gender == 1) {
            $gender = "Male";
        } else {
            $gender = "Female";
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'country' => $country->country_name ?? null,
            'gender' => $gender,
            'status' => $this->status,
            'email' => $this->email,
            'username' => $this->username,
            'phone' => $this->phone,

        ];
    }
}
