<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CancellationPolicyResource extends JsonResource
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
            'days_before_checkin' => $this->days_before_checkin,
            'refund_percentage' => $this->refund_percentage,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
