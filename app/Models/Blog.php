<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'content',
        'image',
        'status',
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
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
