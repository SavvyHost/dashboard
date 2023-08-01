<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
