<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name',
    // 'blog_id'
];
    public function blogs()
    {
        return $this->belongsTo(Blog::class);
    }
}