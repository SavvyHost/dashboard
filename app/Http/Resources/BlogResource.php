<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
			'title' => $this->title,
            'content' => $this->content,
            'category' => $this->category?->name,
            'image' => asset( $this->image ),
            'created_at' => $this->created_at,
        ];
    }
}
