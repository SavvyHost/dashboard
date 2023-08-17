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
            'searchable' => $this->searchable,
            'status' => $this->status,
            'user' => $this->user,
            'category' => $this->category,
            'tags' => $this->tags,
            'image' => asset($this->image),
            'seo_title' => $this->seo_title,
            'seo_image' => asset($this->seo_image),
            'seo_description' => $this->seo_description,
            'facebook_title' => $this->facebook_title,
            'facebook_image' => asset($this->facebook_image),
            'facebook_description' => $this->facebook_description,
            'twitter_title' => $this->twitter_title,
            'twitter_image' => asset($this->twitter_image),
            'twitter_description' => $this->twitter_description,
            'created_at' => $this->created_at,

        ];
    }
}