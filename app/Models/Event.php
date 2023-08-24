<?php

namespace App\Models;

use App\Models\EventDomain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'location',
        'start_date',
        'end_date',
        'title',
        'content',
        'image',
        'searchable',
        'seo_title',
        'seo_image',
        'seo_description',
        'facebook_title',
        'facebook_image',
        'facebook_description',
        'twitter_title',
        'twitter_image',
        'twitter_description',
        'avatar'
    ];
    public function eventDomains()
    {
        return $this->belongsToMany(EventDomain::class, 'event_event_domains');
    }
}