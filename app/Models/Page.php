<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'searchable',
        'content',
        'status',
        'seo_title',
        'seo_description',
        'featured_image',
        'facebook_title',
        'facebook_description',
        'facebook_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'seo_image',
    ];
    public function sections()
    {
        return $this->belongsToMany(Section::class)->using(PageSection::class)->withPivot(['id', 'data'])->orderBy('page_section.id');
    }
}