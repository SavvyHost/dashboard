<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'image',
        'slug',
    ];
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
